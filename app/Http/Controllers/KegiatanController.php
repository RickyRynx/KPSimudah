<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatans = Kegiatan::orderBy('id', 'asc')->paginate(5);
        return view('ketuaUKM.kegiatan.index', compact('kegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ketuaUKM.kegiatan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_usulan' => 'required',
            'nama_kegiatan' => 'required',
            'afiliasi_lomba' => 'required',
            'file_usulan' => 'required|mimes:pdf',
            'skala_lomba' => 'required',
            'laporan_lomba' => 'required'
        ]);

        $fileUsulan = $request->file('file_usulan');
        $originalName = $fileUsulan->getClientOriginalName();
        $fileUsulanPath = $fileUsulan->storeAs('', $originalName);

        Kegiatan::create([
            'no_usulan' => $request->no_usulan,
            'nama_kegiatan' => $request->nama_kegiatan,
            'afiliasi_lomba' => $request->afiliasi_lomba,
            'file_usulan' => $fileUsulanPath,
            'skala_lomba' => $request->skala_lomba,
            'laporan_lomba' => $request->laporan_lomba
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
