<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ukm; // Sesuaikan dengan nama model UKM Anda
use App\Models\User;
use Illuminate\Http\Request;

class UKMAdminSimudahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->input('status');
        $kategori = $request->input('kategori');

        $query = Ukm::query();

        if ($status) {
            $query->where('status', $status);
        }

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        $ukms = $query->get();

        return view('adminSimudah.ukm.index', compact('ukms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Create a new Ukm instance to pass to the view
        $ukm = new Ukm();

        // You might also want to pass a list of users for dropdowns
        $users = User::all();

        return view('adminSimudah.ukm.tambah', compact('ukm', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_ukm' => 'required|string|max:255|unique:ukms,nama_ukm',
            'pembina_id' => 'nullable|exists:users,id|unique:ukms,pembina_id',
            'pelatih_id' => 'nullable|exists:users,id|unique:ukms,pelatih_id',
            'ketuaMahasiswa_id' => 'nullable|exists:users,id|unique:ukms,ketuaMahasiswa_id',
            'status_user' => 'string|max:255',
            'kategori' => 'string|max:255',
        ]);

        Ukm::create($validatedData);

        return redirect()->route('ukm.index')->with('success', 'UKM berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ukm = Ukm::findOrFail($id); // Cari UKM berdasarkan ID
        return view('adminSimudah.ukm.detail', compact('ukm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ukm = Ukm::findOrFail($id); // Cari UKM berdasarkan ID
        $users = User::all(); // Mendapatkan semua pengguna untuk dropdown
        return view('adminSimudah.ukm.edit', compact('ukm', 'users'));
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
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'nama_ukm' => 'required|string|max:255',
            'pembina_id' => 'nullable|exists:users,id',
            'pelatih_id' => 'nullable|exists:users,id',
            'ketuaMahasiswa_id' => 'nullable|exists:users,id',
            'status_user' => 'string|max:255|in:Aktif,Tidak Aktif',
            'kategori' => 'string|max:255|in:UKM,HMJ',
        ]);

        // Cari UKM berdasarkan ID dan update data
        $ukm = Ukm::findOrFail($id);
        $ukm->update($validatedData);

        // Redirect ke halaman index
        return redirect()->route('ukm.index')->with('success', 'UKM/HMJ berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Cari UKM berdasarkan ID dan hapus
        $ukm = Ukm::findOrFail($id);
        $ukm->delete();

        // Redirect ke halaman index
        return redirect()->route('ukm.index')->with('success', 'UKM berhasil dihapus.');
    }
}
