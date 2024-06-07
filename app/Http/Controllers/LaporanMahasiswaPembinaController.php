<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Absensi;
use App\Models\AbsensiDetail;
use App\Models\Ukm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanMahasiswaPembinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $ukm = Ukm::where('pembina_id', $user->id)->first();

        // $absensis = $ukm->absensis()->orderBy('id', 'asc')->paginate(5);

        // return view('pembina.laporanMahasiswa.tampilan', compact('ukm', 'absensis'));


        $absensis = $ukm->absensis()->orderBy('id', 'asc')->paginate(5);
        $absensis = Absensi::where('ukm_id', $ukm->id)->get();
        $absensis = Absensi::where('ukm_id', $ukm->id)
            ->select(DB::raw('YEAR(created_at) as year'), DB::raw('MONTH(created_at) as month'))
            ->distinct()
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->paginate(5);
        return view('pembina.laporanMahasiswa.show', compact('absensis', 'ukm'));

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

        // $year = $request->query('year');
        // $month = $request->query('month');
        // dd($year, $month);
        $ukm = Ukm::findOrFail($id);
        $absensis = $ukm->absensis()->orderBy('id', 'asc')->paginate(5);
        $absensis = Absensi::where('ukm_id', $ukm->id)->get();
        $anggota = Anggota::where('ukm_id', $ukm->id)->get();

        // $detail = AbsensiDetail::where('ukm_id', $ukm->id)->get();
        foreach ($anggota as $member) {
            $member->jumlah_kehadiran = AbsensiDetail::where('anggota_id', $member->id)
                ->where('status_absensi', 'H')
                ->whereHas('absensi', function ($query) use ($year, $month) {
                    $query->whereYear('created_at', $year)
                          ->whereMonth('created_at', $month);
                })
                ->count();
            $member->persentase_kehadiran = ($member->jumlah_kehadiran / 8) * 100; // Asumsi 8 kali latihan dalam sebulan
        }


        // $latestAbsensi = Absensi::where('ukm_id', $ukm->id)
        //     ->orderBy('created_at', 'desc')
        //     ->first();

        // if ($latestAbsensi) {
        //     $year = $latestAbsensi->created_at->year;
        //     $month = $latestAbsensi->created_at->month;
        // } else {
        //     $year = date('Y');
        //     $month = date('m');
        // }

        // $anggota = Anggota::where('ukm_id', $ukm->id)->get();

        // foreach ($anggota as $member) {
        //     $member->jumlah_kehadiran = AbsensiDetail::where('anggota_id', $member->id)
        //         ->where('status_absensi', 'H')
        //         ->whereHas('absensi', function ($query) use ($year, $month) {
        //             $query->whereYear('created_at', $year)
        //                   ->whereMonth('created_at', $month);
        //         })
        //         ->count();
        //     $member->persentase_kehadiran = ($member->jumlah_kehadiran / 8) * 100; // Asumsi 8 kali latihan dalam sebulan
        // }

        return view('pembina.laporanMahasiswa.rekap', compact('absensis','ukm', 'anggota'));
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
