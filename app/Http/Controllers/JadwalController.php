<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();

        // if(!isset($ukm)){
        //     $ukm = Ukm::where('pelatih_id', $user->id)->first();
        // }

        // if(!isset($ukm)){
        //     $ukm = Ukm::where('pembina_id', $user->id)->first();
        // }

        // if (!$ukm) {
        //     return redirect()->back()->with('error', 'User tidak terkait dengan UKM.');
        // }

        $anggotas = $ukm->anggotas ?? collect();
        // dd($ukm);
        return view('ketuaUKM.jadwal.tampilan', compact('ukm', 'jadwals'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ukms = Ukm::all();
        return view('ketuaUKM.jadwal.tambah', compact('ukms'));
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
            'tanggal_kegiatan' => 'required',
            'agenda_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'ketuaMahasiswa_id' => 'required|exists:ukms,id',
            'pelatih_id' => 'required|exists:ukms,id'
        ]);

        $jadwal = new Jadwal([
            'tanggal_kegiatan' => $validateData['tanggal_kegiatan'],
            'agenda_kegiatan' => $validateData['agenda_kegiatan'],
            'lokasi_kegiatan' => $validateData['lokasi_kegiatan'],
        ]);

        $ketuaMahasiswa = Ukm::find($request->ketuaMahasiswa_id);
        $pelatih = Ukm::find($request->pelatih_id);

        $jadwal->ketuaMahasiswa()->associate($ketuaMahasiswa);
        $jadwal->pelatih()->associate($pelatih);

        $jadwal->save();
        // return redirect()->route('jadwal.index')->with('Success', 'Jadwal Berhasil Ditambahkan');
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
        $jadwals = $ukm->jadwals ?? collect();
        $jadwals = Jadwal::orderBy('id', 'asc')->get();
        return view('ketuaUKM.jadwal.show', compact('jadwals', 'ukm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwals = Jadwal::findOrFail($id);
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
