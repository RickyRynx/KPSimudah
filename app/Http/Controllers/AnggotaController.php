<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
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

         $anggotas = $ukm->anggotas ?? collect();

         return view('ketuaUKM.anggota.tampilan', compact('ukm', 'anggotas'));
     }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();
        // dd($user);

        return view('ketuaUKM.anggota.tambah', compact('ukm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'npm' => 'required|numeric',
            'nama_mahasiswa' => 'required',
            'nomor_hp' => 'required|numeric',
            'email' => 'required|email',
            'jabatan' => 'required',
            //'ukm_id' => 'required|exists:ukms,id',
            'status_user' => 'string|max:255|in:Aktif,Tidak Aktif',
        ]);

        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();

        $anggota = new Anggota([
            'npm' => $validateData['npm'],
            'nama_mahasiswa' => $validateData['nama_mahasiswa'],
            'nomor_hp' => $validateData['nomor_hp'],
            'email' => $validateData['email'],
            'jabatan' => $validateData['jabatan'],
            'status_user' => $validateData['status_user'],
            'ketuaMahasiswa_id' => $user->id, // Menetapkan ID user sebagai ketua
            'ukm_id' => $ukm->id, // Menetapkan ID UKM
        ]);

        $anggota->save();

        return redirect()->route('anggota.show', ['id' => $anggota->ukm_id])->with('success', 'Anggota Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();
        $anggotas = $ukm->anggotas ?? collect(); // Gunakan ?? untuk mengatasi ketika $ukm->anggotas bernilai null
        $anggotas = Anggota::orderBy('id', 'asc')->paginate(5);
        return view('ketuaUKM.anggota.show', compact('anggotas', 'ukm'));

    }



    public function showUserDetail($id)
    {
        $anggota = Anggota::findOrFail($id);

    // Assumption: Ukm model has a relationship with User
        $userId = optional($anggota->ukm->user)->id; // Mengambil ID user dari relasi Ukm

        return redirect()->route('user.show', $userId);
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
        $validateData = $request->validate([
            'npm' => 'required',
            'nama_mahasiswa' => 'required',
            'email' => 'required|email',
            'nomor_hp' => 'required',
            'jabatan' => 'required',
            // 'ukm_id' => 'required|exists:ukms,id',
            'status' => 'required',
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update($validateData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
    }


}
