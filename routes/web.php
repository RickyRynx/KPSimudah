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
use App\Http\Controllers\ProfileKetuaUKMController;
use App\Http\Controllers\ProfilePembinaController;
use App\Http\Controllers\ProfilePelatihController;
use App\Http\Controllers\ProfileAdminKeuanganController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\ProfileBidangKemahasiswaanController;
use App\Http\Controllers\AddKetuaUKMController;
use App\Http\Controllers\AddPembinaController;
use App\Http\Controllers\AddPelatihController;
use App\Http\Controllers\AddAdminKeuanganController;
use App\Http\Controllers\AddBidangKemahasiswaanController;
use App\Http\Controllers\LaporanKegiatanPembinaController;
use App\Http\Controllers\DataEmailController;
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
    Route::resource('/anggota', AnggotaController::class)->parameters(['anggota' => 'id']);
    Route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
    Route::put('/anggota/{id}', [AnggotaController::class, 'update'])->name('anggota.update');
    Route::resource('/laporanInventaris', LaporanInventarisController::class)->parameters(['laporanInventaris' => 'id']);
    Route::resource('/inventaris', InventarisController::class)->parameters(['inventaris' => 'id']);
    Route::get('/inventaris/{id}/edit', [InventarisController::class, 'edit'])->name('inventaris.edit');
    Route::put('/inventaris/{id}', [InventarisController::class, 'update'])->name('inventaris.update');
    Route::delete('/inventaris/{id}', [InventarisController::class, 'destroy'])->name('inventaris.destroy');
    Route::get('ketuaUKM/kegiatan/{id}', [KegiatanController::class, 'show'])->name('ketuaUKM.kegiatan.show');
    Route::resource('/kegiatan', KegiatanController::class)->parameters(['kegiatan' => 'id']);
    Route::get('kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    Route::put('kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::resource('/pengumuman', PengumumanController::class)->parameters(['pengumuman' => 'id']);
    Route::delete('/pengumuman/{id}', 'PengumumanController@destroy')->name('pengumuman.destroy');
    Route::resource('/absensi', absensiController::class)->parameters(['absensi' => 'id']);
    Route::get('/absensi/{id}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
    Route::get('/absensi/detail/{id}', [AbsensiController::class, 'detail'])->name('absensi.detail');
    Route::put('/absensi/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
    Route::resource('/jadwal', JadwalController::class)->parameters(['jadwal' => 'id']);
    Route::resource('/jadwalPelatih', JadwalPelatihController::class)->parameters(['jadwalPelatih' => 'id']);
    Route::resource('/kegiatanPelatih', KegiatanPelatihController::class)->parameters(['kegiatanPelatih' => 'id']);
    Route::resource('/absensiPelatih', AbsensiPelatihController::class)->parameters(['absensiPelatih' => 'id']);
    Route::resource('/pengumumanPelatih', PengumumanPelatihController::class)->parameters(['pengumumanPelatih' => 'id']);
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
    Route::get('/laporanMahasiswaBidangKemahasiswaan/{id}/{year}/{month}', [LaporanMahasiswaBidangKemahasiswaanController::class, 'show'])->name('laporanMahasiswaBidangKemahasiswaan');
    Route::resource('/laporanMahasiswaBidangKemahasiswaan', LaporanMahasiswaBidangKemahasiswaanController::class)->parameters(['laporanMahasiswaBidangKemahasiswaan' => 'id']);
    Route::resource('/laporanKegiatanKemahasiswaan', LaporanKegiatanKemahasiswaanController::class)->parameters(['laporanKegiatanKemahasiswaan' => 'id']);
    Route::resource('/profileKetuaUKM', ProfileKetuaUKMController::class)->parameters(['profileKetuaUKM' => 'id']);
    Route::get('/profileKetuaUKM/{id}/edit', [ProfileKetuaUKMController::class, 'edit'])->name('profileKetuaUKM.edit');
    Route::put('/profileKetuaUKM/{id}', [ProfileKetuaUKMController::class, 'update'])->name('profileKetuaUKM.update');
    Route::resource('/profilePembina', ProfilePembinaController::class)->parameters(['profilePembina' => 'id']);
    Route::get('/profilePembina/{id}/edit', [ProfilePembinaController::class, 'edit'])->name('profilePembina.edit');
    Route::put('/profilePembina{id}', [ProfilePembinaController::class, 'update'])->name('profilePembina.update');
    Route::resource('/profilePelatih', ProfilePelatihController::class)->parameters(['profilePelatih' => 'id']);
    Route::get('/profilePelatih/{id}/edit', [ProfilePelatihController::class, 'edit'])->name('profilePelatih.edit');
    Route::put('/profilePelatih/{id}', [ProfilePelatihController::class, 'update'])->name('profilePelatih.update');
    Route::resource('/profileAdminKeuangan', ProfileAdminKeuanganController::class)->parameters(['profileAdminKeuangan' => 'id']);
    Route::get('/profileAdminKeuangan/{id}/edit', [ProfileAdminKeuanganController::class, 'edit'])->name('profileAdminKeuangan.edit');
    Route::put('/profileAdminKeuangan/{id}', [ProfileAdminKeuanganController::class, 'update'])->name('profileAdminKeuangan.update');
    Route::resource('/profileAdmin', ProfileAdminController::class)->parameters(['profileAdmin' => 'id']);
    Route::get('/profileAdmin/{id}/edit', [ProfileAdminController::class, 'edit'])->name('profileAdmin.edit');
    Route::put('/profileAdmin/{id}', [ProfileAdminController::class, 'update'])->name('profileAdmin.update');
    Route::resource('/profileBidangKemahasiswaan', ProfileBidangKemahasiswaanController::class)->parameters(['profileBidangKemahasiswaan' => 'id']);
    Route::get('/profileBidangKemahasiswaan/{id}/edit', [ProfileBidangKemahasiswaanController::class, 'edit'])->name('profileBidangKemahasiswaan.edit');
    Route::put('/profileBidangKemahasiswaan/{id}', [ProfileBidangKemahasiswaanController::class, 'update'])->name('profileBidangKemahasiswaan.update');
    route::resource('/addKetuaUKM', AddKetuaUKMController::class);
    route::resource('/addPembina', AddPembinaController::class);
    route::resource('/addPelatih', AddPelatihController::class);
    route::resource('/addAdminKeuangan', AddAdminKeuanganController::class);
    route::resource('/addBidangKemahasiswaan', AddBidangKemahasiswaanController::class);
    Route::post('/laporanPelatih/filter', [LaporanPelatihAdminKeuanganController::class, 'filter'])->name('laporanPelatih.filter');
    Route::get('inventaris/{id}/history', [InventarisController::class, 'history'])->name('inventaris.history');Route::get('inventaris/pdf/{ukm_id}', [InventarisController::class, 'generatePDF'])->name('inventaris.pdf');
    Route::get('inventaris/pdf/{ukm_id}', [InventarisController::class, 'generatePDF'])->name('inventaris.pdf');
    Route::resource('/laporanKegiatan', LaporanKegiatanPembinaController::class)->parameters(['laporanKegiatan' => 'id']);
    Route::resource('/email', DataEmailController::class)->parameters(['email' => 'id']);
});

// Route::resource('/laporanKegiatanKemahasiswaan', LaporanKegiatanKemahasiswaanController::class);
// web.php atau berkas rute yang sesuai
// Route::get('ketuaUKM/kegiatan/show', [KegiatanController::class, 'show'])->name('ketuaUKM.kegiatan.show');

// routes/web.php

// web.php atau file di mana Anda mendefinisikan route
// Route::resource('anggota/create/{id}', AnggotaController::class);

require __DIR__ . '/auth.php';
