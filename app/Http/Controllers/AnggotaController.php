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
            'npm' => 'required|numeric|unique:anggotas,npm',
            'nama_mahasiswa' => 'required|unique:anggotas,nama_mahasiswa',
            'nomor_hp' => 'required|numeric|unique:anggotas,nomor_hp',
            'email' => 'required|email|unique:anggotas,email',
            'jabatan' => 'required|in:KetuaUKM,Sekretaris,Anggota',
            //'ukm_id' => 'required|exists:ukms,id',
            'status_user' => 'string|max:255|in:Aktif,Tidak Aktif',
        ]);

        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();

        if (in_array($validateData['jabatan'], ['KetuaUKM', 'Sekretaris'])) {
            $existingMember = Anggota::where('ukm_id', $ukm->id)
                ->where('jabatan', $validateData['jabatan'])
                ->first();

            if ($existingMember) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['jabatan' => 'Jabatan ' . $validateData['jabatan'] . ' sudah ada dalam UKM ini.']);
            }
        }

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

        return redirect()
            ->route('anggota.show', ['id' => $anggota->ukm_id])
            ->with('success', 'Anggota Berhasil Ditambahkan');
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
        $anggotas = Anggota::orderBy('id', 'asc')->get();
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
        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();
        $anggota = Anggota::findOrFail($id);

        return view('ketuaUKM.anggota.edit', compact('ukm', 'anggota'));
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
            'npm' => 'required|numeric',
            'nama_mahasiswa' => 'required',
            'nomor_hp' => 'required|numeric',
            'email' => 'required|email',
            'jabatan' => 'required|in:KetuaUKM,Sekretaris,Anggota',
            'status_user' => 'required|string|max:255|in:Aktif,Tidak Aktif',
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update($validateData);

        return redirect()
            ->route('anggota.show', ['id' => $anggota->ukm_id])
            ->with('success', 'Anggota Berhasil Diperbarui');
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
