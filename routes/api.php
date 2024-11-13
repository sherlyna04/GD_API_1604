<?php

use Illuminate\Http\Request;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('barang', BarangController::class);