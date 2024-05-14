<?php

use App\Http\Controllers\KetuaUKMController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\AdminKeuanganController;
use App\Http\Controllers\WakilRektorIIIController;
use App\Http\Controllers\AdminSimudahController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AbsensiMahasiswaAdminKeuanganController;
use App\Http\Controllers\AbsensiPelatihController;
use App\Http\Controllers\AbsensiUKMAdminKeuanganController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\JadwalAdminSimudahController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JadwalPelatihController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KegiatanPelatihController;
use App\Http\Controllers\LaporanInventarisController;
use App\Http\Controllers\LaporanPelatihAdminKeuanganController;
use App\Http\Controllers\LaporanMahasiswaPembinaController;
use App\Http\Controllers\PengumumanAdminSimudahController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PengumumanPelatihController;
use App\Http\Controllers\UKMAdminSimudahController;
use App\Http\Controllers\UserAdminSimudahController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/dashboardKetuaUKM', KetuaUKMController::class);
Route::resource('/dashboardPelatih', PelatihController::class);
Route::resource('/dashboardPembina', PembinaController::class);
Route::resource('/dashboardAdminKeuangan', AdminKeuanganController::class);
Route::resource('/dashboardAdminSimudah', AdminSimudahController::class);
Route::resource('/dashboardBidangKemahasiswaan', WakilRektorIIIController::class);
Route::resource('/anggota', AnggotaController::class)->parameters(['anggota' => 'id']);
Route::resource('/laporanInventaris', LaporanInventarisController::class)->parameters(['laporanInventaris' => 'id']);
Route::resource('/inventaris', InventarisController::class)->parameters(['inventaris' => 'id']);
Route::get('ketuaUKM/kegiatan/{id}', [KegiatanController::class, 'show'])->name('ketuaUKM.kegiatan.show');
Route::resource('/kegiatan', KegiatanController::class)->parameters(['kegiatan' => 'id']);
Route::resource('/pengumuman', PengumumanController::class)->parameters(['pengumuman' => 'id']);
Route::resource('/absensi', absensiController::class)->parameters(['absensi' => 'id']);
Route::resource('/jadwal', JadwalController::class)->parameters(['jadwal' => 'id']);
Route::resource('/jadwalPelatih', JadwalPelatihController::class);
Route::resource('/absensiPelatih/', AbsensiPelatihController::class);
Route::resource('/ukm', UKMAdminSimudahController::class);
Route::resource('/jadwalAdminSimudah', JadwalAdminSimudahController::class);
Route::resource('/pengumumanAdminSimudah', PengumumanAdminSimudahController::class);
Route::resource('/user', UserAdminSimudahController::class);
Route::resource('/laporanMahasiswa', LaporanMahasiswaPembinaController::class)->parameters(['laporanMahasiswa' => 'id']);

// web.php atau berkas rute yang sesuai
// Route::get('ketuaUKM/kegiatan/show', [KegiatanController::class, 'show'])->name('ketuaUKM.kegiatan.show');



// routes/web.php


// web.php atau file di mana Anda mendefinisikan route
// Route::resource('anggota/create/{id}', AnggotaController::class);





require __DIR__.'/auth.php';
