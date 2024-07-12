<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ukm;
use App\Models\Absensi;
use App\Models\AbsensiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiUKMAdminKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ukm = Ukm::all();
        return view('adminKeuangan.absensiUKM.tampilan', compact('ukm'));
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
    public function show($id, Request $request)
    {
        $ukm = Ukm::findOrFail($id);
        $query = $ukm->absensis()->orderBy('id', 'asc');
        
        // Inisialisasi variabel $absensis sebagai collection kosong
        $absensis = collect();

        // Filter tanggal jika tanggal_awal dan tanggal_akhir diset
        if ($request->has('tanggal_awal') && $request->has('tanggal_akhir')) {
            $tanggal_awal = $request->input('tanggal_awal');
            $tanggal_akhir = $request->input('tanggal_akhir');

            $query->whereBetween('created_at', [$tanggal_awal . ' 00:00:00', $tanggal_akhir . ' 23:59:59']);
            $absensis = $query->get();

            // Menghitung jumlah kehadiran, izin, dan alpa
            $countData = AbsensiDetail::select(
                'absensi_details.absensi_id',
                DB::raw("COUNT(CASE WHEN absensi_details.status_absensi = 'H' THEN 1 END) AS count_H"),
                DB::raw("COUNT(CASE WHEN absensi_details.status_absensi = 'I' THEN 1 END) AS count_I"),
                DB::raw("COUNT(CASE WHEN absensi_details.status_absensi = 'A' THEN 1 END) AS count_A")
            )
            ->join('absensis', 'absensi_details.absensi_id', '=', 'absensis.id')
            ->groupBy('absensi_details.absensi_id')
            ->get();

            // Join data jumlah kehadiran, izin, dan alpa ke dalam data absensi
            $absensis = $absensis->map(function ($absensi) use ($countData) {
                $counts = $countData->firstWhere('absensi_id', $absensi->id);
                $absensi->count_H = $counts ? $counts->count_H : 0;
                $absensi->count_I = $counts ? $counts->count_I : 0;
                $absensi->count_A = $counts ? $counts->count_A : 0;
                return $absensi;
            });
        }
        return view('adminKeuangan.absensiUKM.show', compact('ukm', 'absensis'));
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
