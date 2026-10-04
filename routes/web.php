<?php

use App\Http\Controllers\AsesmenController;
use App\Http\Controllers\CatatanSesiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\LogHourController;
use App\Http\Controllers\RencanaIntervensiController;
use App\Http\Controllers\SupervisiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('klien', KlienController::class);

// Asesmen (satu per klien)
Route::get('klien/{klien}/asesmen', [AsesmenController::class, 'edit'])->name('klien.asesmen.edit');
Route::put('klien/{klien}/asesmen', [AsesmenController::class, 'update'])->name('klien.asesmen.update');

// Rencana intervensi (bisa banyak versi)
Route::get('klien/{klien}/rencana', [RencanaIntervensiController::class, 'index'])->name('klien.rencana.index');
Route::get('klien/{klien}/rencana/create', [RencanaIntervensiController::class, 'create'])->name('klien.rencana.create');
Route::post('klien/{klien}/rencana', [RencanaIntervensiController::class, 'store'])->name('klien.rencana.store');
Route::get('klien/{klien}/rencana/{rencana}/edit', [RencanaIntervensiController::class, 'edit'])->name('klien.rencana.edit');
Route::put('klien/{klien}/rencana/{rencana}', [RencanaIntervensiController::class, 'update'])->name('klien.rencana.update');
Route::delete('klien/{klien}/rencana/{rencana}', [RencanaIntervensiController::class, 'destroy'])->name('klien.rencana.destroy');

// Catatan sesi / jurnal
Route::get('klien/{klien}/sesi/create', [CatatanSesiController::class, 'create'])->name('klien.sesi.create');
Route::post('klien/{klien}/sesi', [CatatanSesiController::class, 'store'])->name('klien.sesi.store');
Route::get('klien/{klien}/sesi/{sesi}/edit', [CatatanSesiController::class, 'edit'])->name('klien.sesi.edit');
Route::put('klien/{klien}/sesi/{sesi}', [CatatanSesiController::class, 'update'])->name('klien.sesi.update');
Route::delete('klien/{klien}/sesi/{sesi}', [CatatanSesiController::class, 'destroy'])->name('klien.sesi.destroy');

Route::resource('supervisi', SupervisiController::class)->except(['show']);
Route::resource('log-hours', LogHourController::class)->except(['show'])->parameters([
    'log-hours' => 'logHour',
]);

