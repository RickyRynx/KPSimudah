<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggotas = Anggota::orderBy('id', 'asc')->paginate(5);
        return view('ketuaUKM.anggota.index', compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ketuaUKM.anggota.tambah');
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
            'npm' => 'required',
            'nama_mahasiswa' => 'required',
            'email' => 'required|email',
            'nomor_hp' => 'required',
            'jabatan' => 'required',
            'status' => 'required'
        ]);

        Anggota::create([
            'npm' => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'jabatan' => $request->jabatan,
            'status' => $request->status
        ]);
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan');
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
