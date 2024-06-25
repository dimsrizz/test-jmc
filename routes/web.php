<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KabupatenController;

Route::get('/', function () {
    return redirect()->route('provinsi.index');
});


Route::resource('provinsi', ProvinsiController::class);
Route::resource('kabupaten', KabupatenController::class);

Route::get('/filter-kabupaten', [KabupatenController::class, 'filter'])->name('filter.kabupaten');
