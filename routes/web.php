<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\Moora\MooraController;
use App\Http\Controllers\Moora\PerhitunganController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubkriteriaController;
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
    return view('auth.login');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria');
    Route::get('/kriteria/{id}/delete', [KriteriaController::class, 'delete'])->name('kriteria.delete');
    Route::post('/kriteria/create', [KriteriaController::class, 'create'])->name('kriteria.create');
    Route::post('/kriteria/{id}/update', [KriteriaController::class, 'update'])->name('kriteria.update');

    Route::get('/subkriteria/{id}/view', [SubkriteriaController::class, 'index'])->name('subkriteria');
    Route::get('/subkriteria/{id}/delete', [SubkriteriaController::class, 'delete'])->name('subkriteria.delete');
    Route::post('/subkriteria/{kriteria}/create', [SubkriteriaController::class, 'create'])->name('subkriteria.create');
    Route::post('/subkriteria/{id}/{kriteria}/update', [SubkriteriaController::class, 'update'])->name('subkriteria.update');

    Route::get('/periode', [PeriodeController::class, 'index'])->name('periode');
    Route::get('/periode/{id}/delete', [PeriodeController::class, 'delete'])->name('periode.delete');
    Route::post('/periode/create', [PeriodeController::class, 'create'])->name('periode.create');
    Route::post('/periode/{id}/update', [PeriodeController::class, 'update'])->name('periode.update');

    Route::get('/alternatif', [AlternatifController::class, 'index'])->name('alternatif');
    Route::get('/alternatif/{id}/delete', [AlternatifController::class, 'delete'])->name('alternatif.delete');
    Route::post('/alternatif/create', [AlternatifController::class, 'create'])->name('alternatif.create');
    Route::post('/alternatif/{id}/update', [AlternatifController::class, 'update'])->name('alternatif.update');

    Route::get('/perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan');
    Route::get('/perhitungan/moora/', [PerhitunganController::class, 'moora'])->name('perhitungan.moora');
    Route::get('/perhitungan/moora/{id}/delete', [PerhitunganController::class, 'delete'])->name('perhitungan.delete');
    Route::post('/perhitungan/moora/{id}/create', [PerhitunganController::class, 'create'])->name('perhitungan.create');

    Route::get('/perhitungan/matrik-keputusan/{id}', [MooraController::class, 'stepone'])->name('matriKeputusan');
    Route::get('/perhitungan/normalisasi/{periode}', [MooraController::class, 'steptwo'])->name('normalisasi');
    Route::get('/perhitungan/Pembobotan/{periode}', [MooraController::class, 'stepThree'])->name('pembobotan');
    Route::get('/perhitungan/optimasi/{periode}', [MooraController::class, 'stepfour'])->name('optimasi');
});

require __DIR__ . '/auth.php';
