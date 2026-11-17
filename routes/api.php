<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PengajuanCutiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('karyawan', KaryawanController::class);
Route::apiResource('pengajuan-cuti', PengajuanCutiController::class);