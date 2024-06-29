<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use App\Models\Ukm;
use Illuminate\Support\Facades\Auth;

class InventarisController extends Controller
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

         $inventaris = $ukm->inventaris ?? collect();
        return view('ketuaUKM.inventaris.tampilan', compact('ukm', 'inventaris'));
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
        return view('ketuaUKM.inventaris.tambah', compact('ukm'));
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
            'nama_barang' => 'required',
            'jumlah' => 'required|numeric',
            'jumlah_rusak' => 'required|numeric',
            'jumlah_bagus' => 'required|numeric',
            'keterangan' => 'required',
            // 'ukm_id' => 'required|exists:ukms,id',
        ]);

        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();

        $inventaris = new Inventaris([
            'nama_barang' => $validateData['nama_barang'],
            'jumlah' => $validateData['jumlah'],
            'jumlah_rusak' => $validateData['jumlah_rusak'],
            'jumlah_bagus' => $validateData['jumlah_bagus'],
            'keterangan' => $validateData['keterangan'],
            'ketuaMahasiswa_id' => $user->id, // Menetapkan ID user sebagai ketua
            'ukm_id' => $ukm->id, // Menetapkan ID UKM
        ]);

        $inventaris->save();
        return redirect()->route('inventaris.show', ['id' => $inventaris->ukm_id])->with('success', 'Inventaris berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventaris = Inventaris::orderBy('id', 'asc')->get();
        // $inventaris = $ukm->inventaris ?? collect();
        $ukm = Ukm::findOrFail($id);
        return view('ketuaUKM.inventaris.show', compact('inventaris', 'ukm'));
    }

    public function showUserDetail($id)
    {
        $inventaris = Inventaris::findOrFail($id);

    // Assumption: Ukm model has a relationship with User
        $userId = optional($inventaris->ukm->user)->id; // Mengambil ID user dari relasi Ukm

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
        $inventaris = Inventaris::findOrFail($id);
        return view('ketuaUKM.inventaris.edit', compact('inventaris'));
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
            'nama_barang' => 'required',
            'jumlah' => 'required|numeric',
            'jumlah_rusak' => 'required|numeric',
            'jumlah_bagus' => 'required|numeric',
            'keterangan' => 'required',
        ]);
    
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->nama_barang = $validateData['nama_barang'];
        $inventaris->jumlah = $validateData['jumlah'];
        $inventaris->jumlah_rusak = $validateData['jumlah_rusak'];
        $inventaris->jumlah_bagus = $validateData['jumlah_bagus'];
        $inventaris->keterangan = $validateData['keterangan'];
        $inventaris->save();
    
        return redirect()->route('inventaris.show', ['id' => $inventaris->ukm_id])->with('success', 'Inventaris berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $ukm_id = $inventaris->ukm_id;
        $inventaris->delete();

        return redirect()->route('ketuaUKM.inventaris.show', ['id' => $ukm_id])->with('success', 'Inventaris berhasil dihapus');
    }
}
