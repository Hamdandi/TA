<?php

use App\Http\Controllers\CutiController;
use App\Http\Controllers\JenisCutiController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PhkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PunishmentController;
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

Route::get('/', function () {
    return view('template.master');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Karyawan
    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');

    // Jenis Cuti
    Route::get('/jenis-cuti', [JenisCutiController::class, 'index'])->name('jenis-cuti.index');
    Route::get('/jenis-cuti/create', [JenisCutiController::class, 'create'])->name('jenis-cuti.create');
    Route::post('/jenis-cuti', [JenisCutiController::class, 'store'])->name('jenis-cuti.store');

    // Cuti
    Route::get('/cuti', [CutiController::class, 'index'])->name('cuti.index');
    Route::get('/cuti/create', [CutiController::class, 'create'])->name('cuti.create');
    Route::post('/cuti', [CutiController::class, 'store'])->name('cuti.store');

    // Reward
    Route::get('/reward', [RewardController::class, 'index'])->name('reward.index');
    Route::get('/reward/create', [RewardController::class, 'create'])->name('reward.create');
    Route::post('/reward', [RewardController::class, 'store'])->name('reward.store');

    // Punishment
    Route::get('/punishment', [PunishmentController::class, 'index'])->name('punishment.index');
    Route::get('/punishment/create', [PunishmentController::class, 'create'])->name('punishment.create');
    Route::post('/punishment', [PunishmentController::class, 'store'])->name('punishment.store');

    // PHK
    Route::get('/phk', [PhkController::class, 'index'])->name('phk.index');
    Route::get('/phk/create', [PhkController::class, 'create'])->name('phk.create');
    Route::post('/phk', [PhkController::class, 'store'])->name('phk.store');
});

require __DIR__ . '/auth.php';
