<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ukm;
use App\Models\Anggota;
use App\Models\Absensi;
use App\Models\AbsensiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanMahasiswaBidangKemahasiswaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ukm = Ukm::with([
            'absensis' => function ($query) {
                $query->select('ukm_id', DB::raw('YEAR(created_at) as year'), DB::raw('MONTH(created_at) as month'))->distinct()->orderBy('year', 'desc')->orderBy('month', 'desc');
            },
        ])->get();

        $absensis = $ukm->flatMap(function ($ukm) {
            return $ukm->absensis->map(function ($absensi) use ($ukm) {
                $absensi->ukm_nama = $ukm->nama_ukm;
                return $absensi;
            });
        });

        return view('wakilRektorIII.laporanMahasiswa.tampilan', compact('ukm', 'absensis'));
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
    public function show($id, $year, $month)
    {
        $ukm = Ukm::findOrFail($id);
        $anggota = Anggota::where('ukm_id', $ukm->id)->get();

        foreach ($anggota as $member) {
            $member->jumlah_kehadiran = AbsensiDetail::where('anggota_id', $member->id)
                ->where('status_absensi', 'H')
                ->whereHas('absensi', function ($query) use ($year, $month) {
                    $query->whereYear('created_at', $year)->whereMonth('created_at', $month);
                })
                ->count();
            $member->persentase_kehadiran = ($member->jumlah_kehadiran / 8) * 100; // Asumsi 8 kali latihan dalam sebulan
        }
        

        return view('wakilRektorIII.laporanMahasiswa.show', compact('ukm', 'anggota'));
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
