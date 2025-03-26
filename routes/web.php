<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Transfers\PIN\PinController;
use App\Http\Controllers\CatatanDaftarController;
use App\Http\Controllers\CatatanKategoriController;
use App\Http\Controllers\Transfers\TransferKirim\TransferKirimController;
use App\Http\Controllers\Transfers\TransferMinta\TransferMintaController;
use App\Http\Controllers\Transfers\TransferTopUp\TransferTopUpController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboardNew');
})->name('dashboard-new');

// Transfers

Route::prefix('transfer-kirim')->group(function () {
    Route::get('/', [TransferKirimController::class, 'TransferKirimIndex'])->middleware(['auth', 'verified'])->name('transfer-kirim.index');
});

Route::prefix('transfer-minta')->group(function () {
    Route::get('/', [TransferMintaController::class, 'TransferMintaIndex'])->middleware(['auth', 'verified'])->name('transfer-minta.index');
});

Route::prefix('transfer-topup')->group(function () {
    Route::get('/', [TransferTopUpController::class, 'TransferTopUpIndex'])->middleware(['auth', 'verified'])->name('transfer-topup.index');
});

// Transfers(Pin Section)

Route::prefix('set-pin')->group(function () {
    Route::get('/', [PinController::class, 'showSetPinForm'])->middleware(['auth', 'verified'])->name('set-pin');
    Route::post('/', [PinController::class, 'setPin'])->middleware(['auth', 'verified'])->name('set-pin.store');
});

// Transfers(Pin Section) end

// Transfers End

// Catatan
Route::prefix('catatan')->group(function () {
    Route::get('/', [CatatanController::class, 'index'])->middleware(['auth', 'verified'])->name('catatan.index');
});

Route::prefix('catatan-daftar')->group(function () {
    Route::get('/', [CatatanDaftarController::class, 'index'])->middleware(['auth', 'verified'])->name('catatan-daftar.index');
});

Route::prefix('catatan-kategori')->group(function () {
    Route::get('/', [CatatanKategoriController::class, 'index'])->middleware(['auth', 'verified'])->name('catatan-kategori.index');
});
// Catatan End



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::post('auth/google/phone', [GoogleController::class, 'storeGoogleUserWithPhone'])->name('google.store.phone');

require __DIR__ . '/auth.php';
