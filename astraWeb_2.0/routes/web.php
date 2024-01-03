<?php

use App\Http\Controllers\CutiController;
use App\Http\Controllers\JenisCutiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PenugasanController;
use App\Http\Controllers\PhkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PunishmentController;
use App\Http\Controllers\ReqController;
use App\Http\Controllers\RewardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('lowongan.landing');
// });

Route::get('/', [LowonganController::class, 'landing'])->name('lowongan.landing');
Route::post('/lamaran', [LamaranController::class, 'store'])->name('lamaran.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/chance-password/{profile}', [ProfileController::class, 'chancepassword'])->name('profile.chancepassword');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Lowongan
    Route::get('/lowongan', [LowonganController::class, 'index'])->name('lowongan.index');
    Route::get('/lowongan/create', [LowonganController::class, 'create'])->name('lowongan.create');
    Route::post('/lowongan', [LowonganController::class, 'store'])->name('lowongan.store');
    Route::get('/lowongan/edit/{lowongan}', [LowonganController::class, 'edit'])->name('lowongan.edit');
    Route::patch('/lowongan/{lowongan}', [LowonganController::class, 'update'])->name('lowongan.update');
    Route::delete('/lowongan/delete/{lowongan}', [LowonganController::class, 'destroy'])->name('lowongan.destroy');

    // Lamaran
    Route::get('/lamaran', [LamaranController::class, 'index'])->name('lamaran.index');
    Route::get('/lamaran/edit/{lamaran}', [LamaranController::class, 'edit'])->name('lamaran.edit');
    Route::patch('/lamaran/{lamaran}', [LamaranController::class, 'update'])->name('lamaran.update');

    // Karyawan
    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');

    // Jenis Cuti
    Route::get('/jenis-cuti', [JenisCutiController::class, 'index'])->name('jenis-cuti.index');
    Route::get('/jenis-cuti/create', [JenisCutiController::class, 'create'])->name('jenis-cuti.create');
    Route::post('/jenis-cuti', [JenisCutiController::class, 'store'])->name('jenis-cuti.store');
    Route::get('/jenis-cuti/edit/{jenis_cuti}', [JenisCutiController::class, 'edit'])->name('jenis-cuti.edit');
    Route::patch('/jenis-cuti/{jenis_cuti}', [JenisCutiController::class, 'update'])->name('jenis-cuti.update');
    Route::delete('/jenis-cuti/delete/{jenis_cuti}', [JenisCutiController::class, 'destroy'])->name('jenis-cuti.destroy');

    // Cuti
    Route::get('/cuti', [CutiController::class, 'index'])->name('cuti.index');
    Route::get('/cuti/create', [CutiController::class, 'create'])->name('cuti.create');
    Route::post('/cuti', [CutiController::class, 'store'])->name('cuti.store');
    Route::get('/cuti/edit/{cuti}', [CutiController::class, 'edit'])->name('cuti.edit');
    Route::patch('/cuti/{cuti}', [CutiController::class, 'update'])->name('cuti.update');
    Route::delete('/cuti/delete/{cuti}', [CutiController::class, 'destroy'])->name('cuti.destroy');

    // verifiasi cuti
    Route::get('/cuti/verifikasi/{id}', [CutiController::class, 'verifikasiCuti'])->name('cuti.verifikasi');

    // Pennugasan
    Route::get('/penugasan', [PenugasanController::class, 'index'])->name('penugasan.index');
    Route::get('/penugasan/create', [PenugasanController::class, 'create'])->name('penugasan.create');
    Route::post('/penugasan', [PenugasanController::class, 'store'])->name('penugasan.store');
    Route::get('/penugasan/edit/{penugasan}', [PenugasanController::class, 'edit'])->name('penugasan.edit');
    Route::patch('/penugasan/{penugasan}', [PenugasanController::class, 'update'])->name('penugasan.update');

    // Pelatihan
    Route::get('/pelatihan', [PelatihanController::class, 'index'])->name('pelatihan.index');
    Route::get('/pelatihan/create', [PelatihanController::class, 'create'])->name('pelatihan.create');
    Route::post('/pelatihan', [PelatihanController::class, 'store'])->name('pelatihan.store');
    Route::get('/pelatihan/edit/{pelatihan}', [PelatihanController::class, 'edit'])->name('pelatihan.edit');
    Route::patch('/pelatihan/{pelatihan}', [PelatihanController::class, 'update'])->name('pelatihan.update');

    // Lembur
    Route::get('/lembur', [LemburController::class, 'index'])->name('lembur.index');
    Route::get('/lembur/create', [LemburController::class, 'create'])->name('lembur.create');
    Route::post('/lembur', [LemburController::class, 'store'])->name('lembur.store');
    Route::get('/lembur/edit/{lembur}', [LemburController::class, 'edit'])->name('lembur.edit');
    Route::patch('/lembur/{lembur}', [LemburController::class, 'update'])->name('lembur.update');

    // Reward
    Route::get('/reward', [RewardController::class, 'index'])->name('reward.index');
    Route::get('/reward/create', [RewardController::class, 'create'])->name('reward.create');
    Route::post('/reward', [RewardController::class, 'store'])->name('reward.store');
    Route::get('/reward/edit/{reward}', [RewardController::class, 'edit'])->name('reward.edit');
    Route::patch('/reward/{reward}', [RewardController::class, 'update'])->name('reward.update');

    // Punishment
    Route::get('/punishment', [PunishmentController::class, 'index'])->name('punishment.index');
    Route::get('/punishment/create', [PunishmentController::class, 'create'])->name('punishment.create');
    Route::post('/punishment', [PunishmentController::class, 'store'])->name('punishment.store');
    Route::get('/punishment/edit/{punishment}', [PunishmentController::class, 'edit'])->name('punishment.edit');
    Route::patch('/punishment/{punishment}', [PunishmentController::class, 'update'])->name('punishment.update');

    // PHK
    Route::get('/phk', [PhkController::class, 'index'])->name('phk.index');
    Route::get('/phk/create', [PhkController::class, 'create'])->name('phk.create');
    Route::post('/phk', [PhkController::class, 'store'])->name('phk.store');
    Route::get('/phk/edit/{phk}', [PhkController::class, 'edit'])->name('phk.edit');
    Route::patch('/phk/{phk}', [PhkController::class, 'update'])->name('phk.update');

    // Req
    Route::get('/req', [ReqController::class, 'index'])->name('req.index');
    Route::get('/req/show/{req}', [ReqController::class, 'show'])->name('req.show');
    Route::get('/req/create', [ReqController::class, 'create'])->name('req.create');
    Route::post('/req', [ReqController::class, 'store'])->name('req.store');
    Route::get('/req/edit/{req}', [ReqController::class, 'edit'])->name('req.edit');
    Route::patch('/req/{req}', [ReqController::class, 'update'])->name('req.update');
    Route::delete('/req/delete/{req}', [ReqController::class, 'destroy'])->name('req.destroy');
});

require __DIR__ . '/auth.php';
