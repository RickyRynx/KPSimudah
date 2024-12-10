<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ukm;
use App\Models\Jadwal;
use Illuminate\Support\Arr;

class JadwalAdminSimudahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwals = Jadwal::orderBy('id', 'asc')->paginate(5);
        $ukms = Ukm::all();
        return view('adminSimudah.jadwal.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwals = new Jadwal();

        // You might also want to pass a list of users for dropdowns
        $ukms = Ukm::all();
        return view('adminSimudah.jadwal.tambah', compact('jadwals', 'ukms'));

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
        'ukm_id' => 'required|exists:ukms,id|unique:jadwals,ukm_id',
        'waktu_mulai' => 'required|date_format:H:i',
        'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
        'hari' => 'required|array',
        'tempat' => 'required|string',
    ]);

    // Convert array to JSON for database storage
    $validateData['hari'] = implode(',', $validateData['hari']);
    Jadwal::create($validateData);
    return redirect()->route('jadwalAdminSimudah.index')->with('success', 'Jadwal berhasil ditambahkan.');
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
        $jadwal = Jadwal::findOrFail($id); // Cari Jadwal berdasarkan ID
        $ukms = Ukm::all(); // Mendapatkan semua UKM untuk dropdown
        return view('adminSimudah.jadwal.edit', compact('jadwal', 'ukms'));
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
        $validatedData = $request->validate([
            'ukm_id' => 'required|exists:ukms,id',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'hari' => 'required|array',
            'tempat' => 'required|string|max:255',
        ]);

        // Convert array to JSON for database storage
        $validatedData['hari'] = implode(',', $validatedData['hari']);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($validatedData);

        return redirect()->route('adminSimudah.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
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
