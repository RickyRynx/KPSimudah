<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\AbsensiDetail;
use App\Models\Ukm;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\AbsensiCreated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Dompdf\Dompdf;
use Dompdf\Options;
use Carbon\Carbon;
use App\Models\DataEmail;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();

        $absensis = $ukm->absensis()->orderBy('id', 'asc')->paginate(5);

        return view('ketuaUKM.absensi.tampilan', compact('ukm', 'absensis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();

        $anggota = Anggota::where('ukm_id', $ukm->id)->get();

        $pelatih = User::findOrFail($ukm->pelatih_id);
        // dd($pelatih);

        // $hadir = $ukm->absensis()->where('status_absensi', 'H')->count();
        // $izin = $ukm->absensis()->where('status_absensi', 'I')->count();
        // $alpa = $ukm->absensis()->where('status_absensi', 'A')->count();

        return view('ketuaUKM.absensi.tambah', compact('ukm', 'anggota', 'pelatih'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi dan simpan data absensi
        $validateData = $request->validate([
            'keterangan' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:3072',
            'kehadiran_pelatih' => 'required|in:Hadir,Tidak Hadir',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ]);

        $ext = $request->image->getClientOriginalExtension();
        $rename_file = 'file-' . time() . '.' . $ext;
        $request->image->storeAs('public/foto_absensi/', $rename_file);

        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();
        $validateData['user_id'] = $user->id;
        $validateData['ukm_id'] = $ukm->id;
        $validateData['image'] = $rename_file;
        $absensis = Absensi::create($validateData);

        // Validasi dan simpan data absensi detail
        $validateData1 = $request->validate([
            'anggota_id' => 'required|array',
            'anggota_id.*' => 'exists:anggotas,id',
            'status_absensi' => 'required|array',
            'status_absensi.*' => 'in:H,I,A',
            'keterangan_absensi' => 'required',
        ]);

        $absensiDetailData = [];
        foreach ($request->anggota_id as $anggotaItem) {
            $absensiDetailData[] = [
                'absensi_id' => $absensis->id,
                'anggota_id' => $anggotaItem,
                'status_absensi' => $request->input("status_absensi.{$anggotaItem}"),
                'keterangan_absensi' => $request->input("keterangan_absensi.{$anggotaItem}"),
            ];
        }
        AbsensiDetail::insert($absensiDetailData);

        // Ambil data detail kehadiran anggota
        $absensiDetails = AbsensiDetail::where('absensi_id', $absensis->id)->get();

        // Mengubah gambar logo menjadi base64
        $path = public_path('img/logo.png');
        $base64Logo = base64_encode(file_get_contents($path));
        $base64Logo = 'data:image/png;base64,' . $base64Logo;

        // Persiapkan data untuk PDF
        $pdfOptions = new Options();
        $pdfOptions->set('isHtml5ParserEnabled', true);
        $pdfOptions->set('isRemoteEnabled', true);
        $pdf = new Dompdf($pdfOptions);

        // Render view dengan data absensi dan detailnya
        $html = view('ketuaUKM.absensi.view', compact('absensis', 'absensiDetails', 'user', 'ukm', 'base64Logo'))->render();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        // Menentukan bagian hari berdasarkan waktu saat ini
        $currentHour = Carbon::now()->hour;
        if ($currentHour >= 0 && $currentHour < 12) {
            $timeOfDay = 'Pagi';
        } elseif ($currentHour >= 12 && $currentHour < 15) {
            $timeOfDay = 'Siang';
        } elseif ($currentHour >= 15 && $currentHour < 18) {
            $timeOfDay = 'Sore';
        } else {
            $timeOfDay = 'Malam';
        }

        // Mengatur waktu realtime dan keterangan waktu untuk subjek email
        $currentTime = Carbon::now()->format('H:i:s');
        $nama_ukm = $ukm->nama_ukm;
        $subject = "Laporan Absensi $nama_ukm";

        $idCurrentUser = Auth::user()->id;
        $ukm = Ukm::where('ketuaMahasiswa_id', $idCurrentUser)->first();
        $id_pembina_ukm = $ukm->pembina_id;

        if (isset($id_pembina_ukm)) {
            $data_pembina = User::findOrFail($id_pembina_ukm);
            $alamatTujuan = $data_pembina->email;
            $nama_ukm = $ukm->nama_ukm;

            // Email CC berdasarkan kondisi
            $ccEmails = [];
            if (in_array($nama_ukm, ['Futsal MDP', 'Volley MDP', 'Basket MDP'])) {
                // Mengambil email dari tabel data_email jika nama UKM sesuai
                $ccEmails = DataEmail::pluck('email')->toArray();
            }

            // Mengambil email dari tabel user dengan role bidangKemahasiswaan
            $bidangKemahasiswaanEmails = User::where('role', 'bidangKemahasiswaan')->pluck('email')->toArray();

            // Menggabungkan kedua daftar email untuk CC
            $ccEmails = array_merge($ccEmails, $bidangKemahasiswaanEmails);

            // Kirim email dengan pesan di body dan lampiran PDF
            Mail::send(
                'ketuaUKM.absensi.text',
                [
                    'timeOfDay' => $timeOfDay,
                    'nama_ukm' => $nama_ukm,
                ],
                function ($message) use ($pdf, $alamatTujuan, $nama_ukm, $subject, $ccEmails) {
                    $message
                        ->to($alamatTujuan)
                        ->cc($ccEmails) // Menambahkan CC ke beberapa email
                        ->subject($subject)
                        ->attachData($pdf->output(), 'absensi_' . $nama_ukm . '.pdf');
                }
            );

            return redirect()
                ->route('absensi.show', ['id' => $absensis->ukm_id])
                ->with('success', 'Absensi Berhasil Ditambahkan');
        } else {
            return redirect()
                ->route('absensi.show', ['id' => $absensis->ukm_id])
                ->with('success', 'Absensi Berhasil ditambahkan, tetapi data pembina belum di set, tidak dapat mengirimkan email');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id, Request $request)
    {
        $ukm = Ukm::findOrFail($id);

        $query = $ukm->absensis()->orderBy('id', 'asc');

        // Filter tanggal jika tanggal_awal dan tanggal_akhir diset
        if ($request->has('tanggal_awal') && $request->has('tanggal_akhir')) {
            $tanggal_awal = $request->input('tanggal_awal');
            $tanggal_akhir = $request->input('tanggal_akhir');

            $query->whereBetween('created_at', [$tanggal_awal . ' 00:00:00', $tanggal_akhir . ' 23:59:59']);
        }

        $absensis = $query->get();

        // Menghitung jumlah kehadiran, izin, dan alpa
        $countData = AbsensiDetail::select('absensi_details.absensi_id', DB::raw("COUNT(CASE WHEN absensi_details.status_absensi = 'H' THEN 1 END) AS count_H"), DB::raw("COUNT(CASE WHEN absensi_details.status_absensi = 'I' THEN 1 END) AS count_I"), DB::raw("COUNT(CASE WHEN absensi_details.status_absensi = 'A' THEN 1 END) AS count_A"))->join('absensis', 'absensi_details.absensi_id', '=', 'absensis.id')->groupBy('absensi_details.absensi_id')->get();

        // Join data jumlah kehadiran, izin, dan alpa ke dalam data absensi
        $absensis = $absensis->map(function ($absensi) use ($countData) {
            $counts = $countData->firstWhere('absensi_id', $absensi->id);
            $absensi->count_H = $counts ? $counts->count_H : 0;
            $absensi->count_I = $counts ? $counts->count_I : 0;
            $absensi->count_A = $counts ? $counts->count_A : 0;
            return $absensi;
        });

        // Tampilkan view dengan data yang telah diproses
        return view('ketuaUKM.absensi.show', compact('absensis', 'ukm'));
    }

    public function detail($id)
    {
        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();
        $absensi = Absensi::findOrFail($id);
        $absensiDetails = AbsensiDetail::where('absensi_id', $id)->get();

        return view('ketuaUKM.absensi.detail', compact('absensi', 'absensiDetails', 'ukm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $anggota = Anggota::where('ukm_id', $absensi->ukm_id)->get();
        $absensiDetails = AbsensiDetail::where('absensi_id', $id)->get()->keyBy('anggota_id');

        foreach ($anggota as $member) {
            $member->status_absensi = $absensiDetails[$member->id]->status_absensi ?? null;
        }

        return view('ketuaUKM.absensi.edit', compact('absensi', 'anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'keterangan' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif',
            'kehadiran_pelatih' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ]);

        $absensi = Absensi::findOrFail($id);

        if ($request->hasFile('image')) {
            $ext = $request->image->getClientOriginalExtension();
            $rename_file = 'file-' . time() . '.' . $ext;
            $request->image->storeAs('public/foto_absensi/', $rename_file);
            $validateData['image'] = $rename_file;

            // Hapus file lama
            if ($absensi->image) {
                Storage::delete('public/foto_absensi/' . $absensi->image);
            }
        }

        $absensi->update($validateData);

        $statusAbsensi = $request->input('status_absensi');

        foreach ($statusAbsensi as $anggotaId => $status) {
            AbsensiDetail::updateOrCreate(['absensi_id' => $id, 'anggota_id' => $anggotaId], ['status_absensi' => $status]);
        }

        return redirect()
            ->route('ketuaUKM.absensi.show', $absensi->ukm_id)
            ->with('success', 'Data absensi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
