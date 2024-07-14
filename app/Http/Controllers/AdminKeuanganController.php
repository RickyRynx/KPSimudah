<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ukm;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class AdminKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        // Ambil semua pengguna dengan role 'pelatih' yang terkait dengan UKM tertentu
        $pelatih = User::where('role', 'pelatih')->get();

        $absensi = Absensi::pluck('kehadiran_pelatih');
        // Inisialisasi array untuk menyimpan data kehadiran
        $kehadiranPelatih = [];

        // Looping untuk setiap pelatih
        foreach ($pelatih as $p) {
            // Ambil absensi berdasarkan user_id pelatih dan kehadiran_pelatih hadir
            $kehadiran_pelatih = $absensi;
            $total_kehadiran = $kehadiran_pelatih->count();

            // Tambahkan ke array kehadiranPelatih
            $kehadiranPelatih[] = [
                'nama_pelatih' => $p->name,
                'total_kehadiran' => $kehadiran_pelatih,
            ];
        }

        return view('adminKeuangan.dashboard.index', compact('user', 'kehadiranPelatih'));
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
