<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;


class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwals = Jadwal::orderBy('id', 'asc')->paginate(5);
        return view('ketuaUKM.jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ketuaUKM.jadwal.tambah');
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
            'tanggal_kegiatan' => 'required',
            'agenda_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'penanggung_jawab' => 'required',
            'pelatih' => 'required'
        ]);

        Jadwal::create([
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'agenda_kegiatan' => $request->agenda_kegiatan,
            'lokasi_kegiatan' => $request->lokasi_kegiatan,
            'penanggung_jawab' => $request->penanggung_jawab,
            'pelatih' => $request->pelatih
        ]);
        return redirect()->route('jadwal.index')->with('success', 'Anggota berhasil ditambahkan');
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
