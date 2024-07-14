<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ukm;
use App\Models\Jadwal;
use App\Models\Anggota;
use App\Models\Kegiatan;
use App\Models\Inventaris;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class KetuaUKMController extends Controller
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

        if ($ukm) {
            $ukmId = $ukm->id;
            $jadwals = Jadwal::where('ukm_id', $ukmId)->get();
            $anggotas = Anggota::where('ukm_id', $ukmId)->count();
            $absensis = Absensi::where('ukm_id', $ukmId)->count();
            $kegiatans = Kegiatan::where('ukm_id', $ukmId)->count();
            $inventaris = Inventaris::where('ukm_id', $ukmId)->count();
        } else {
            $jadwals = collect(); // return an empty collection if no UKM found
            $anggotas = 0;
            $absensis = 0;
            $kegiatans = 0;
            $inventaris = 0;
        }

        return view('ketuaUKM.dashboard.index', compact('user', 'ukm', 'jadwals', 'kegiatans', 'anggotas', 'inventaris', 'absensis'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
