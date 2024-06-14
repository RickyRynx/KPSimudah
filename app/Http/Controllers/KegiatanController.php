<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
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

    // Perbaikan: Menggunakan relasi pada model Ukm untuk mengambil kegiatan
    $kegiatans = $ukm->kegiatans()->orderBy('id', 'asc')->get();

    return view('ketuaUKM.kegiatan.tampilan', compact('ukm', 'kegiatans'));
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
        return view('ketuaUKM.kegiatan.tambah', compact('ukm'));
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
            'no_usulan' => 'required',
            'nama_kegiatan' => 'required',
            'afiliasi_lomba' => 'required',
            'file_usulan' => 'required|mimes:pdf',
            'skala_lomba' => 'required',
            'laporan_lomba' => 'required|mimes:pdf',
            //'ukm_id' => 'required|exists:ukms,id'
        ]);

        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();

        $fileUsulan = $request->file('file_usulan');
        $laporanLomba = $request->file('laporan_lomba');

    // Membedakan nama file usulan dan laporan lomba
        $originalNameFileUsulan = $fileUsulan->getClientOriginalName();
        $originalNameLaporanLomba = $laporanLomba->getClientOriginalName();

    // Simpan file usulan
        $fileUsulanPath = $fileUsulan->storeAs('public/file_usulan/', $originalNameFileUsulan);

    // Simpan file laporan lomba
        $laporanLombaPath = $laporanLomba->storeAs('public/file_laporan/', $originalNameLaporanLomba);

    // Tambahkan nama file ke dalam data yang akan disimpan ke database
        $validateData['file_usulan'] = $originalNameFileUsulan;
        $validateData['laporan_lomba'] = $originalNameLaporanLomba;
        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();

        $kegiatan = new Kegiatan([
            'no_usulan' => $validateData['no_usulan'],
            'nama_kegiatan' => $validateData['nama_kegiatan'],
            'afiliasi_lomba' => $validateData['afiliasi_lomba'],
            'file_usulan' => $validateData['file_usulan'],
            'skala_lomba' => $validateData['skala_lomba'],
            'laporan_lomba' => $validateData['laporan_lomba'],
            'ketuaMahasiswa_id' => $user->id, // Menetapkan ID user sebagai ketua
            'ukm_id' => $ukm->id, // Menetapkan ID UKM
        ]);

        $kegiatan->save();

        return redirect()->route('kegiatan.show', ['id' => $kegiatan->ukm_id])->with('success', 'Kegiatan berhasil ditambahkan');
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
    $kegiatans = $ukm->kegiatans()->orderBy('id', 'asc')->get();
    $kegiatans = $ukm->kegiatans ?? collect();
    return view('ketuaUKM.kegiatan.show', compact('kegiatans', 'ukm'));
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
