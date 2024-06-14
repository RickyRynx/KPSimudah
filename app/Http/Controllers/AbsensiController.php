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

        // $hadir = $ukm->absensis()->where('status_absensi', 'H')->count();
        // $izin = $ukm->absensis()->where('status_absensi', 'I')->count();
        // $alpa = $ukm->absensis()->where('status_absensi', 'A')->count();

        return view('ketuaUKM.absensi.tambah', compact('ukm', 'anggota'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'keterangan' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif',
            'kehadiran_pelatih' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
        ]);


        //ambil extensi //png / jpg / gif
        $ext = $request->image->getClientOriginalExtension();

        //ubah nama file file
        $rename_file = 'file-' . time() . "." . $ext; //contoh file : file-timestamp.jpg

        //upload foler ke dalam folder public
        $request->image->storeAs('public/foto_absensi/', $rename_file); //bisa diletakan difolder lain dengan store ke public/(folderlain)

        $user = Auth::user(); // Mendapatkan informasi user yang sedang terautentikasi
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first(); // Mendapatkan UKM yang dikelola oleh user
        $validateData['user_id'] = Auth::id();
        $validateData['user_id'] = $user->id;
        $validateData['ukm_id'] = $ukm->id;
        $validateData['image'] = $rename_file;
        $absensis = Absensi::create($validateData);

        $validateData1 = $request->validate([
            'anggota_id' => 'required|array',
            'anggota_id.*' => 'exists:anggotas,id',
            'status_absensi' => 'required|array',
            'status_absensi.*' => 'in:H,I,A',
        ]);

        $absensiDetailData = [];
        foreach ($request->anggota_id as $anggotaItem) {
            $absensiDetailData[] = [
                'absensi_id' => $absensis->id,
                'anggota_id' => $anggotaItem,
                'status_absensi' => $request->input("status_absensi.{$anggotaItem}"),
                'keterangan' => $request->input("keterangan_absensi.{$anggotaItem}"),
            ];
        }
        // dd($absensiDetailData);
        AbsensiDetail::insert($absensiDetailData);

        $pdfOptions = new Options();
        $pdfOptions->set('isHtml5ParserEnabled', true);
        $pdfOptions->set('isRemoteEnabled', true);
        $pdf = new Dompdf($pdfOptions);
        $html = view('ketuaUKM.absensi.view', compact('absensis'))->render();
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        $idCurrentUser = Auth::user()->id; //get id current user
        $ukm = Ukm::where('ketuaMahasiswa_id', $idCurrentUser)->first(); //get data ukm
        $id_pembina_ukm = $ukm->pembina_id;

        if (isset($id_pembina_ukm)) {
            $data_pembina = User::findOrFail($id_pembina_ukm);
            $alamatTujuan = $data_pembina->email;

            Mail::send('ketuaUKM.absensi.view', compact('absensis'), function($message) use ($pdf, $alamatTujuan) {
                $message->to($alamatTujuan)->subject('Absensi Baru');
                $message->attachData($pdf->output(), 'absensi.pdf');
            });

            return redirect()->route('absensi.show', ['id' => $absensis->ukm_id])->with('success', 'Absensi Berhasil Ditambahkan');
        } else {
            return redirect()->route('absensi.show', ['id' => $absensis->ukm_id])->with('success', 'Absensi Berhasil ditambahkan, tetapi data pembina belum di set, tidak dapat mengirimkan email');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $ukm = Ukm::findOrFail($id);
        // $absensis = $ukm->absensis()->orderBy('id', 'asc')->get();
        // dd("print");
        // dd($absensiDetail);

        $absensis = Absensi::select(
            'absensis.id',
            'absensis.user_id',
            'absensis.ukm_id',
            'absensis.keterangan',
            'absensis.image',
            'absensis.kehadiran_pelatih',
            'absensis.waktu_mulai',
            'absensis.waktu_selesai',
            DB::raw("COUNT(CASE WHEN absensi_details.status_absensi = 'H' THEN 1 END) AS count_H"),
            DB::raw("COUNT(CASE WHEN absensi_details.status_absensi = 'I' THEN 1 END) AS count_I"),
            DB::raw("COUNT(CASE WHEN absensi_details.status_absensi = 'A' THEN 1 END) AS count_A")
        )
            ->join('absensi_details', 'absensis.id', '=', 'absensi_details.absensi_id')
            ->groupBy(
                'absensis.id',
                'absensis.user_id',
                'absensis.ukm_id',
                'absensis.keterangan',
                'absensis.image',
                'absensis.kehadiran_pelatih',
                'absensis.waktu_mulai',
                'absensis.waktu_selesai'
            )
            ->get();
        // dd($datas);

        $anggota = Anggota::where('ukm_id', $ukm->id)->get();
        // return view('ketuaUKM.absensi.show', compact('absensis', 'ukm', 'anggota'));
        return view('ketuaUKM.absensi.show', compact('absensis', 'ukm', 'anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
