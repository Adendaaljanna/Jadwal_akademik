<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UKMController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Manajemen\JadwalController as ManajemenJadwalController;
use App\Http\Controllers\Manajemen\MatakuliahController;
use App\Http\Controllers\Manajemen\EventController as ManajemenEventController;
use App\Http\Controllers\Manajemen\UKMController as ManajemenUKMController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('dashboard_public');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
    Route::get('/event', [EventController::class, 'index'])->name('event');
    Route::get('/ukm', [UKMController::class, 'index'])->name('ukm');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware('role:dosen,kaprodi')->name('mahasiswa');
    Route::prefix('manajemen')->middleware('role:kaprodi,kemahasiswaan')->group(function () {
        Route::get('/jadwal', [ManajemenJadwalController::class, 'index'])->name('manajemen.jadwal');
        Route::get('/matakuliah', [MatakuliahController::class, 'index'])->name('manajemen.matakuliah');
        Route::get('/event', [ManajemenEventController::class, 'index'])->name('manajemen.event');
        Route::get('/ukm', [ManajemenUKMController::class, 'index'])->name('manajemen.ukm');

        // Resource route untuk CRUD
        Route::resource('jadwal', ManajemenJadwalController::class, [
            'as' => 'manajemen'
        ])->except(['show']);
        Route::resource('jadwal-non-akademik', \App\Http\Controllers\Manajemen\JadwalNonAkademikController::class, [
            'as' => 'manajemen'
        ])->except(['show']);
        Route::resource('matakuliah', MatakuliahController::class, [
            'as' => 'manajemen'
        ])->except(['show']);
        Route::resource('event', ManajemenEventController::class, [
            'as' => 'manajemen'
        ])->except(['show']);
        Route::resource('ukm', ManajemenUKMController::class, [
            'as' => 'manajemen'
        ])->except(['show']);
    });
    Route::match(['get', 'post'], '/profil', [ProfilController::class, 'index'])->name('profil');
    Route::post('/event/{id}/daftar', [EventController::class, 'daftar'])->name('event.daftar');
    Route::post('/manajemen/ukm', [\App\Http\Controllers\Manajemen\UKMController::class, 'store'])->name('manajemen.ukm.store');
});

require __DIR__.'/auth.php';
