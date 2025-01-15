<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/', function () {
    return view('index');
});*/

Route::get('/', function () {
    return view('dashboard');
});

// DATA ALTERNATIF
Route::get('/alternatif', [\App\Http\Controllers\AlternatifController::class, 'index'])->name('alternatif.index');
Route::delete('/alternatif/{id}', [\App\Http\Controllers\AlternatifController::class, 'destroy'])->name('alternatif.destroy');
Route::post('/alternatif', [\App\Http\Controllers\AlternatifController::class, 'store'])->name('alternatif.store');
Route::put('/alternatif/{id}', [\App\Http\Controllers\AlternatifController::class, 'update'])->name('alternatif.update');
Route::get('alternatif/{id}/edit', [\App\Http\Controllers\AlternatifController::class, 'edit'])->name('alternatif.edit');

// DATA KRITERIA
Route::get('/kriteria', [\App\Http\Controllers\KriteriaController::class, 'index'])->name('kriteria.index');
Route::delete('/kriteria/{id}', [\App\Http\Controllers\KriteriaController::class, 'destroy'])->name('kriteria.destroy');
Route::post('/kriteria', [\App\Http\Controllers\KriteriaController::class, 'store'])->name('kriteria.store');
Route::put('/kriteria/{id}', [\App\Http\Controllers\KriteriaController::class, 'update'])->name('kriteria.update');
Route::get('kriteria/{id}/edit', [\App\Http\Controllers\KriteriaController::class, 'edit'])->name('kriteria.edit');

// DATA PENILAIAN
Route::get('/penilaian', [\App\Http\Controllers\PenilaianController::class, 'index'])->name('penilaian.index');
Route::post('/penilaian', [\App\Http\Controllers\PenilaianController::class, 'store'])->name('penilaian.store');
Route::put('/penilaian/{id}', [\App\Http\Controllers\PenilaianController::class, 'update'])->name('penilaian.update');
Route::get('penilaian/{id}/edit', [\App\Http\Controllers\PenilaianController::class, 'edit'])->name('penilaian.edit');

// DATA FUZZY
Route::get('/fuzzy/calculate', [\App\Http\Controllers\FuzzyController::class, 'calculate'])->name('fuzzy.calculate');
Route::get('/update-fuzzy', [\App\Http\Controllers\FuzzyController::class, 'updateAllFuzzyData']);


// DATA PERHITUNGAN
Route::get('/perhitungan', [\App\Http\Controllers\PerhitunganController::class, 'index'])->name('perhitungan.index');