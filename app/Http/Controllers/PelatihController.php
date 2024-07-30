<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ukm;
use App\Models\Anggota;
use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class PelatihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        // Mengambil data UKM yang dibina oleh user
        $ukm = Ukm::where('pelatih_id', $user->id)->first();

        // Mengambil data absensi anggota UKM
        $absensiData = $ukm ? Absensi::where('ukm_id', $ukm->id)->get() : collect();

        // Mengelompokkan data absensi per hari
        $kehadiranHarian = $absensiData->groupBy(function($item) {
            return $item->created_at->format('Y-m-d');
        })->map(function($group) {
            return $group->count();
        });

        // Mengelompokkan data absensi per bulan
        $keaktifanBulanan = $absensiData->groupBy(function($item) {
            return $item->created_at->format('Y-m');
        })->map(function($group) {
            return $group->count();
        });

        return view('pelatih.dashboard.index', compact('user', 'kehadiranHarian', 'keaktifanBulanan'));
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
