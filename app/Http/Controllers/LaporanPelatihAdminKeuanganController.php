<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ukm;
use App\Models\User;
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanPelatihAdminKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ukm = Ukm::all();
        $pelatih = User::where('role', 'pelatih')->get();
        return view('adminKeuangan.laporanPelatih.index', compact('ukm', 'pelatih'));
    }

    public function filter(Request $request)
    {
        $request->validate([
            'tanggalMulai' => 'required|date',
            'tanggalSelesai' => 'required|date|after_or_equal:tanggalMulai',
        ]);

        $tanggalMulai = $request->tanggalMulai;
        $tanggalSelesai = $request->tanggalSelesai;

        $ukm = Ukm::all();

        // Mengambil data absensi berdasarkan tanggal created_at
        $absensi = Absensi::whereBetween('created_at', [$tanggalMulai, $tanggalSelesai])
            ->get();

        
        // Menghitung jumlah kehadiran dan jumlah latihan
        $laporan = [];
        foreach ($ukm as $ukm_item) {
            $kehadiran_pelatih = $absensi->where('ukm_id', $ukm_item->id)->pluck('kehadiran_pelatih');
            $total_kehadiran = $kehadiran_pelatih->count();
            $jumlah_latihan = $kehadiran_pelatih->count();

            $laporan[] = [
                'ukm' => $ukm_item->nama_ukm,
                'total_kehadiran' => $total_kehadiran,
                'jumlah_latihan' => $jumlah_latihan
            ];
        }


        // // Menghitung jumlah kehadiran dan jumlah latihan
        // $laporan = [];

        // foreach ($pelatih as $pelatih_item) {
        //     $ukm_item = $ukm->firstWhere('id', $pelatih_item->ukm_id);
        //     $kehadiran_pelatih = $absensi->where('user_id', $pelatih_item->id)->pluck('kehadiran_pelatih');

        //     // Menghitung total kehadiran sebagai integer
        //     $total_kehadiran = $kehadiran_pelatih->map(function($item) {
        //         return (int) $item; // Pastikan tipe integer
        //     })->sum();

        //     // Menghitung jumlah latihan sebagai jumlah record yang ditemukan
        //     $jumlah_latihan = $kehadiran_pelatih->count();

        //     $laporan[] = [
        //         'ukm' => $ukm_item ? $ukm_item->nama_ukm : 'UKM Tidak Ditemukan',
        //         'pelatih' => $pelatih_item->name,
        //         'total_kehadiran' => $total_kehadiran,
        //         'jumlah_latihan' => $jumlah_latihan
        //     ];
        // }

        return view('adminKeuangan.laporanPelatih.index', compact('ukm', 'laporan', 'tanggalMulai', 'tanggalSelesai'));
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
