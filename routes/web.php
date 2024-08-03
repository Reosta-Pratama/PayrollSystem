<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\JadwalKerjaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;



// Login
Route::get('login', [LoginController::class, 'view'])->name('login.form');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('', function () {
        return view('highFidelity.pages.dashboard'); 
    })->name('dashboard');

    // Pegawai
    Route::get('/pegawai/insert', function () {
        return view('highFidelity.pages.pegawai.create');
    })->name('pegawai.insert');
    Route::post('/pegawai/insert/saving', [PegawaiController::class, 'insert'])->name('pegawai.insert.saving');
    Route::get('/pegawai', [PegawaiController::class, 'list'])->name('pegawai.list');
    Route::get('/pegawai/{id}', [PegawaiController::class, 'read'])->name('pegawai.read');
    Route::post('/pegawai/{id}/updating', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::get('/pegawai/{id}/deleting', [PegawaiController::class, 'delete'])->name('pegawai.delete');

    // Gaji
    Route::get('/gaji', [GajiController::class, 'list'])->name('gaji.list');
    Route::get('/gaji/{id}', [GajiController::class, 'read'])->name('gaji.read');
    Route::post('/gaji/{id}/inserting', [GajiController::class, 'insert'])->name('gaji.insert');
    Route::get('/gaji/{id}/deleting', [GajiController::class, 'delete'])->name('gaji.delete');

    // Jadwal kerja
    Route::get('/jadwalKerja/insert', function () {
        return view('highFidelity.pages.jadwalKerja.create');
    })->name('jadwalKerja.insert');
    Route::post('/jadwalKerja/insert/saving', [JadwalKerjaController::class, 'insert'])->name('jadwalKerja.insert.saving');
    Route::get('/jadwalKerja', [JadwalKerjaController::class, 'list'])->name('jadwalKerja.list');
    Route::get('/jadwalKerja/{id}', [JadwalKerjaController::class, 'read'])->name('jadwalKerja.read');
    Route::post('/jadwalKerja/{id}/updating', [JadwalKerjaController::class, 'update'])->name('jadwalKerja.update');
    Route::get('/jadwalKerja/{id}/deleting', [JadwalKerjaController::class, 'delete'])->name('jadwalKerja.delete');

    // Absensi
    Route::get('/absensi', [AbsensiController::class, 'view'])->name('absensi.list');
    Route::post('/absensi/clockin', [AbsensiController::class, 'clockin'])->name('absensi.clockin');
    Route::post('/absensi/clockout', [AbsensiController::class, 'clockout'])->name('absensi.clockout');

    // Slip Gaji
    Route::get('/report/slipGaji', [ReportController::class, 'slipGaji'])->name('slipGaji');
});

