<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Models\Ukm;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
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

    $pengumumen = $ukm->pengumumen()->orderBy('id', 'asc')->paginate(5);

    return view('ketuaUKM.pengumuman.tampilan', compact('ukm', 'pengumumen'));
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
        //$ukmWithKetuaMahasiswa = Ukm::with('ketuaMahasiswa')->get();

        return view('ketuaUKM.pengumuman.tambah', compact('ukm'));
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
            'judul' => 'required',
            'isi_pengumuman' => 'required',
            'waktu_upload' => 'required',
        ]);

        $user = Auth::user(); // Mendapatkan informasi user yang sedang terautentikasi
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first(); // Mendapatkan UKM yang dikelola oleh user

        // Menyimpan data pengumuman dengan menetapkan nilai 'ketuaMahasiswa_id' dari user yang terautentikasi
        $pengumuman = new Pengumuman([
            'judul' => $validateData['judul'],
            'isi_pengumuman' => $validateData['isi_pengumuman'],
            'waktu_upload' => $validateData['waktu_upload'],
            'ketuaMahasiswa_id' => $user->id, // Menetapkan ID user sebagai ketua
            'ukm_id' => $ukm->id, // Menetapkan ID UKM
        ]);

        $pengumuman->save();

        return redirect()->route('pengumuman.show', ['id' => $ukm->id])->with('success', 'Pengumuman berhasil ditambahkan');
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
        $pengumumen = Pengumuman::where('ukm_id', $ukm->id)->orderBy('id', 'asc')->get();
        return view('ketuaUKM.pengumuman.show', compact('pengumumen', 'ukm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('ketuaUKM.pengumuman.edit', compact('pengumuman'));
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
            'judul' => 'required',
            'isi_pengumuman' => 'required',
            'waktu_upload' => 'required',
        ]);
    
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->judul = $validateData['judul'];
        $pengumuman->isi_pengumuman = $validateData['isi_pengumuman'];
        $pengumuman->waktu_upload = $validateData['waktu_upload'];
        $pengumuman->save();
    
        return redirect()->route('pengumuman.show', ['id' => $pengumuman->ukm_id])->with('success', 'Pengumuman berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $ukm_id = $pengumuman->ukm_id;
        $pengumuman->delete();

        return redirect()->route('ketuaUKM.pengumuman.show', ['id' => $ukm_id])->with('success', 'Pengumuman berhasil dihapus');
    }
}
