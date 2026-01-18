<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KendaraanController;
use App\Http\Controllers\Admin\PenyewaanController;
use App\Http\Controllers\LandingController;

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

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/kendaraan', [LandingController::class, 'kendaraan'])->name('landing.kendaraan');
Route::get('/kendaraan/{id}', [LandingController::class, 'detailKendaraan'])->name('landing.kendaraan.detail');

Route::post('/kendaraan/{id}/sewa',
    [LandingController::class, 'sewa']
)->name('landing.kendaraan.sewa');

Route::prefix('dashboard')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::resource('kendaraan', KendaraanController::class);

    // Update status kendaraan
    Route::put(
        'kendaraan/{id}/update-status',
        [KendaraanController::class, 'updateStatus']
    )->name('kendaraan.update-status');

    Route::resource('penyewaan', PenyewaanController::class);

    // Update status pembayaran
    Route::put(
        'penyewaan/{id}/update-status-pembayaran',
        [PenyewaanController::class, 'updateStatusPembayaran']
    )->name('penyewaan.updaste-status-pembayaran');
});
