<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use App\Models\InventarisHistory;
use App\Models\Ukm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;


class InventarisController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();

        $inventaris = $ukm->inventaris ?? collect();
        return view('ketuaUKM.inventaris.tampilan', compact('ukm', 'inventaris'));
    }

    public function create()
    {
        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();
        return view('ketuaUKM.inventaris.tambah', compact('ukm'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|numeric',
            'jumlah_rusak' => 'required|numeric',
            'jumlah_bagus' => 'required|numeric',
            'keterangan' => 'required',
        ]);

        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();

        $inventaris = new Inventaris([
            'nama_barang' => $validateData['nama_barang'],
            'jumlah' => $validateData['jumlah'],
            'jumlah_rusak' => $validateData['jumlah_rusak'],
            'jumlah_bagus' => $validateData['jumlah_bagus'],
            'keterangan' => $validateData['keterangan'],
            'ketuaMahasiswa_id' => $user->id,
            'ukm_id' => $ukm->id,
        ]);

        $inventaris->save();

        // Catat history
        InventarisHistory::create([
            'inventaris_id' => $inventaris->id,
            'action' => 'created',
            'new_values' => $inventaris->toArray(),
        ]);

        return redirect()
            ->route('inventaris.show', ['id' => $inventaris->ukm_id])
            ->with('success', 'Inventaris berhasil ditambahkan');
    }

    public function show($id)
    {
        $inventaris = Inventaris::orderBy('id', 'asc')->get();
        $ukm = Ukm::findOrFail($id);
        return view('ketuaUKM.inventaris.show', compact('inventaris', 'ukm'));
    }

    public function showUserDetail($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $userId = optional($inventaris->ukm->user)->id;

        return redirect()->route('user.show', $userId);
    }

    public function edit($id)
    {
        $user = Auth::user();
        $ukm = Ukm::where('ketuaMahasiswa_id', $user->id)->first();
        $inventaris = Inventaris::findOrFail($id);
        return view('ketuaUKM.inventaris.edit', compact('ukm', 'inventaris'));
    }

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

        // Simpan data lama untuk history
        $oldValues = $inventaris->toArray();

        // Update inventaris
        $inventaris->update($validateData);

        // Catat history
        InventarisHistory::create([
            'inventaris_id' => $inventaris->id,
            'action' => 'updated',
            'old_values' => $oldValues,
            'new_values' => $inventaris->toArray(),
        ]);

        return redirect()
            ->route('inventaris.show', ['id' => $inventaris->ukm_id])
            ->with('success', 'Inventaris berhasil diupdate');
    }

    public function destroy($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $ukm_id = $inventaris->ukm_id;

        // Simpan data lama untuk history
        $oldValues = $inventaris->toArray();

        // Hapus inventaris
        $inventaris->delete();

        // Catat history
        InventarisHistory::create([
            'inventaris_id' => $id,
            'action' => 'deleted',
            'old_values' => $oldValues,
            'new_values' => null,
        ]);

        return redirect()
            ->route('inventaris.show', ['id' => $ukm_id])
            ->with('success', 'Inventaris berhasil dihapus');
    }

    public function history($ukm_id)
    {
        $ukm = Ukm::findOrFail($ukm_id);
        $histories = InventarisHistory::whereHas('inventaris', function ($query) use ($ukm_id) {
            $query->where('ukm_id', $ukm_id);
        })->get();

        return view('ketuaUKM.inventaris.history', compact('ukm', 'histories'));
    }

    public function generatePDF($ukm_id)
    {
        $user = Auth::user();
        $ukm = Ukm::with('pembina')->findOrFail($ukm_id);
        $inventaris = Inventaris::where('ukm_id', $ukm_id)->get();

        // Mengambil path gambar
        $logoPath = public_path('img/logo.png');

        // Membaca file gambar
        if (file_exists($logoPath)) {
            $imageData = file_get_contents($logoPath);
            $base64Logo = 'data:image/png;base64,' . base64_encode($imageData);
        } else {
            $base64Logo = ''; // Logo tidak ditemukan
        }

        // Mengambil tampilan blade dan merendernya ke HTML
        $html = view('ketuaUKM.inventaris.pdf', compact('ukm', 'inventaris', 'user', 'base64Logo'))->render();

        // Membuat instance Dompdf dan mengkonfigurasinya
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true); // Enables PHP in Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Mendownload file PDF
        return $dompdf->stream('Laporan_Inventaris_' . $ukm->nama_ukm . '.pdf');
    }
}
