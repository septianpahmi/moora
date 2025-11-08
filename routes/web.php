<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredAlternatifController;
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

    Route::get('/kriteria', [KriteriController::class, 'index'])->name('kriteria');
    Route::post('/kriteria/create', [KriteriController::class, 'create'])->name('kriteria.create');
    Route::get('/kriteria/delete/{id}', [KriteriController::class, 'delete'])->name('kriteria.delete');
    Route::post('/kriteria/update/{id}', [KriteriController::class, 'update'])->name('kriteria.update');
    
    Route::get('/subkriteria', [SubkriteriaController::class, 'index'])->name('subkriteria');
    Route::post('/subkriteria/create', [SubkriteriaController::class, 'create'])->name('subkriteria.create');
    Route::get('/subkriteria/delete/{id}', [SubkriteriaController::class, 'delete'])->name('subkriteria.delete');
    Route::post('/subkriteria/update/{id}', [SubkriteriaController::class, 'update'])->name('subkriteria.update');

    Route::get('/alternatif', [AlternatifController::class, 'index'])->name('alternatif');
    Route::post('/alternatif/create', [AlternatifController::class, 'create'])->name('alternatif.create');
    Route::get('/alternatif/delete/{id}', [AlternatifController::class, 'delete'])->name('alternatif.delete');
    Route::post('/alternatif/update/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');
    
    Route::get('/perhitungan', [RegisteredAlternatifController::class, 'index'])->name('perhitungan');
    Route::post('/perhitungan/create/{id}', [RegisteredAlternatifController::class, 'create'])->name('perhitungan.create');

});

require __DIR__.'/auth.php';
