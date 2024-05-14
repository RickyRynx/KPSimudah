<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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
        // if (Auth::check()) {
        // // Lakukan validasi login
        // // ...

        //     if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        //         $user = Auth::user();

        //         if ($user->isAdmin()) {
        //             return redirect()->route('adminSimudah.dashboard.index');
        //         } elseif ($user->isPembina()) {
        //             return redirect()->route('pembina.dashboard.index');
        //         } elseif ($user->isPelatih()) {
        //             return redirect()->route('pelatih.dashboard.index');
        //         } elseif ($user->isBidangKemahasiswaan()) {
        //             return redirect()->route('wakilRektorIII.dashboard.index');
        //         } elseif ($user->isAdminKeuangan()) {
        //             return redirect()->route('adminKeuangan.dashboard.index');
        //         } elseif ($user->isKetuaUKM()) {
        //             return redirect()->route('ketuaUKM.dashboard.index');
        //         } else {
        //         // Pengguna tidak memiliki peran yang valid
        //             Auth::logout();
        //             return redirect()->route('login')->with('error', 'Invalid role.');
        //         }
        //     } else {
        //     // Gagal login
        //         return redirect()->route('login')->with('error', 'Invalid credentials.');
        //     }
        // } else {
        //     return redirect()->route('login')->with('error', 'Unauthorized.');
        // }
        return view('ketuaUKM.dashboard.index');
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
