<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ukm;
use App\Models\Anggota;
use App\Models\Absensi;

class WakilRektorIIIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ukms = Ukm::all();

        $rataRataKehadiran = [];

        foreach ($ukms as $ukm) {
            // Menghitung rata-rata kehadiran absensi mahasiswa
            $totalAbsensi = Absensi::where('ukm_id', $ukm->id)->count();
            $totalAnggota = $ukm->anggota()->count();
            $rataRataKehadiran[] = [
                'nama_ukm' => $ukm->nama_ukm,
                'rata_rata_kehadiran' => $totalAbsensi > 0 ? round($totalAbsensi / $totalAnggota, 2) : 0,
            ];
        }

        // Mengirimkan data ke view
        return view('wakilRektorIII.dashboard.index', compact('rataRataKehadiran'));
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
