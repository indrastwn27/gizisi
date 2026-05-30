<?php
use App\Http\Controllers\SigiziController;
use Illuminate\Support\Facades\Route;

// STORE
Route::post('/balita',            [SigiziController::class, 'storeBalita']);
Route::post('/pengukuran',        [SigiziController::class, 'storePengukuran']);
Route::post('/wilayah',           [SigiziController::class, 'storeWilayah']);
Route::post('/posyandu',          [SigiziController::class, 'storePosyandu']);
Route::post('/pengguna',          [SigiziController::class, 'storePengguna']);
Route::post('/artikel',           [SigiziController::class, 'storeArtikel']);
Route::post('/jadwal',            [SigiziController::class, 'storeJadwal']);
Route::post('/notifikasi',        [SigiziController::class, 'storeNotifikasi']);

// UPDATE
Route::post('/balita/{id}',       [SigiziController::class, 'updateBalita']);
Route::post('/pengukuran/{id}',   [SigiziController::class, 'updatePengukuran']);
Route::post('/wilayah/{id}',      [SigiziController::class, 'updateWilayah']);
Route::post('/posyandu/{id}',     [SigiziController::class, 'updatePosyandu']);
Route::post('/pengguna/{id}',     [SigiziController::class, 'updatePengguna']);
Route::post('/artikel/{id}',      [SigiziController::class, 'updateArtikel']);
Route::post('/jadwal/{id}',       [SigiziController::class, 'updateJadwal']);

// DELETE
Route::post('/balita/{id}/delete',      [SigiziController::class, 'destroyBalita']);
Route::post('/pengukuran/{id}/delete',  [SigiziController::class, 'destroyPengukuran']);
Route::post('/wilayah/{id}/delete',     [SigiziController::class, 'destroyWilayah']);
Route::post('/posyandu/{id}/delete',    [SigiziController::class, 'destroyPosyandu']);
Route::post('/pengguna/{id}/delete',    [SigiziController::class, 'destroyPengguna']);
Route::post('/artikel/{id}/delete',     [SigiziController::class, 'destroyArtikel']);
Route::post('/jadwal/{id}/delete',      [SigiziController::class, 'destroyJadwal']);