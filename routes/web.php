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
use App\Http\Controllers\AbsensiUKMBidangKemahasiswaanController;
use App\Http\Controllers\AbsensiMahasiswaBidangKemahasiswaanController;
use App\Http\Controllers\LaporanMahasiswaBidangKemahasiswaanController;
use App\Http\Controllers\LaporanKegiatanKemahasiswaanController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::group(['middleware' => ['auth', 'prevent-back-history']], function () {
    Route::get('/dashboardKetuaUKM', [KetuaUKMController::class, 'index'])->name('ketuaUKM.dashboard.index');
    Route::get('/dashboardPelatih', [PelatihController::class, 'index'])->name('pelatih.dashboard.index');
    Route::get('/dashboardPembina', [PembinaController::class, 'index'])->name('pembina.dashboard.index');
    Route::get('/dashboardAdminKeuangan', [AdminKeuanganController::class, 'index'])->name('adminKeuangan.dashboard.index');
    Route::get('/dashboardAdminSimudah', [AdminSimudahController::class, 'index'])->name('adminSimudah.dashboard.index');
    Route::get('/dashboardBidangKemahasiswaan', [WakilRektorIIIController::class, 'index'])->name('wakilRektorIII.dashboard.index');
});


Route::resource('/anggota', AnggotaController::class)->parameters(['anggota' => 'id']);
Route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::put('/anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
Route::resource('/laporanInventaris', LaporanInventarisController::class)->parameters(['laporanInventaris' => 'id']);
Route::resource('/inventaris', InventarisController::class)->parameters(['inventaris' => 'id']);
// Route::get('/inventaris/{id}/edit', 'InventarisController@edit')->name('inventaris.edit');
// Route::put('/inventaris/{id}', 'InventarisController@update')->name('inventaris.update');
// Route::delete('/inventaris/{id}', 'InventarisController@destroy')->name('inventaris.destroy');
Route::get('ketuaUKM/kegiatan/{id}', [KegiatanController::class, 'show'])->name('ketuaUKM.kegiatan.show');
Route::resource('/kegiatan', KegiatanController::class)->parameters(['kegiatan' => 'id']);
Route::get('kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
Route::put('kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
Route::resource('/pengumuman', PengumumanController::class)->parameters(['pengumuman' => 'id']);
Route::delete('/pengumuman/{id}', 'PengumumanController@destroy')->name('pengumuman.destroy');
Route::resource('/absensi', absensiController::class)->parameters(['absensi' => 'id']);
Route::get('/absensi/{id}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
Route::put('/absensi/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
Route::resource('/jadwal', JadwalController::class)->parameters(['jadwal' => 'id']);
Route::resource('/jadwalPelatih', JadwalPelatihController::class);
Route::resource('/absensiPelatih/', AbsensiPelatihController::class);
Route::resource('/ukm', UKMAdminSimudahController::class);
Route::resource('/jadwalAdminSimudah', JadwalAdminSimudahController::class);
Route::resource('/pengumumanAdminSimudah', PengumumanAdminSimudahController::class);
Route::resource('/user', UserAdminSimudahController::class);
Route::get('/laporanMahasiswa/{id}/{year}/{month}', [LaporanMahasiswaPembinaController::class, 'show'])->name('laporanMahasiswa');
Route::resource('/laporanMahasiswa', LaporanMahasiswaPembinaController::class)->parameters(['laporanMahasiswa' => 'id']);
Route::resource('/absensiMahasiswaKeuangan', AbsensiMahasiswaAdminKeuanganController::class)->parameters(['absensiMahasiswaKeuangan' => 'id']);
Route::resource('/absensiUKMKeuangan', AbsensiUKMAdminKeuanganController::class)->parameters(['absensiUKMKeuangan' => 'id']);
Route::resource('/laporanPelatih', LaporanPelatihAdminKeuanganController::class);
Route::resource('/absensiUKM', AbsensiUKMBidangKemahasiswaanController::class)->parameters(['absensiUKM' => 'id']);
Route::resource('/absensiMahasiswa', AbsensiMahasiswaBidangKemahasiswaanController::class)->parameters(['absensiMahasiswa' => 'id']);
Route::resource('/laporanMahasiswaKemahasiswaan', LaporanMahasiswaBidangKemahasiswaanController::class);
Route::resource('/laporanKegiatanKemahasiswaan', LaporanKegiatanKemahasiswaanController::class)->parameters(['laporanKegiatanKemahasiswaan' => 'id']);
// Route::resource('/laporanKegiatanKemahasiswaan', LaporanKegiatanKemahasiswaanController::class);
// web.php atau berkas rute yang sesuai
// Route::get('ketuaUKM/kegiatan/show', [KegiatanController::class, 'show'])->name('ketuaUKM.kegiatan.show');





// routes/web.php


// web.php atau file di mana Anda mendefinisikan route
// Route::resource('anggota/create/{id}', AnggotaController::class);





require __DIR__.'/auth.php';
