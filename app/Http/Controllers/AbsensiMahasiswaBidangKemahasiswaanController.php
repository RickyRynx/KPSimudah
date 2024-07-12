<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ukm;
use App\Models\Anggota;
use App\Models\Absensi;
use App\Models\AbsensiDetail;
use Illuminate\Http\Request;

class AbsensiMahasiswaBidangKemahasiswaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ukm = Ukm::all();
        return view('wakilRektorIII.absensiMahasiswa.tampilan', compact('ukm'));
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
    public function show(Request $request, $id)
    {
        $ukm = Ukm::findOrFail($id);
        $anggota = collect(); // Inisialisasi koleksi kosong

        // Cek apakah ada input tanggal
        if ($request->has(['start_date', 'end_date'])) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            // Ambil anggota berdasarkan filter tanggal
            $anggota = Anggota::where('ukm_id', $ukm->id)->get();

            foreach ($anggota as $member) {
                $member->jumlah_kehadiran = AbsensiDetail::where('anggota_id', $member->id)
                    ->where('status_absensi', 'H')
                    ->whereHas('absensi', function ($query) use ($startDate, $endDate) {
                        $query->whereBetween('created_at', [$startDate, $endDate]);
                    })
                    ->count();
                $member->persentase_kehadiran = ($member->jumlah_kehadiran / 8) * 100; // Asumsi 8 kali latihan dalam sebulan
            }
        }

        return view('wakilRektorIII.absensiMahasiswa.show', compact('ukm', 'anggota'));
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
