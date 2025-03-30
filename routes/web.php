<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvestasiController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\CatatanDaftarController;
use App\Http\Controllers\CatatanKategoriController;
use App\Http\Controllers\Transfers\PIN\PinController;
use App\Http\Controllers\Transfers\Transaksi\TopUp\TopUpController;
use App\Http\Controllers\Transfers\Transaksi\TopUp\CheckPinController;
use App\Http\Controllers\Transfers\TransferKirim\TransferKirimController;
use App\Http\Controllers\Transfers\TransferMinta\TransferMintaController;
use App\Http\Controllers\Transfers\TransferTopUp\TransferTopUpController;
use App\Http\Controllers\Transfers\Transaksi\kirim\KirimSucceedController;
use App\Http\Controllers\Transfers\Transaksi\TopUp\TopupSucceedController;
use App\Http\Controllers\Transfers\Transaksi\kirim\TransaksiKirimController;
use App\Http\Controllers\Transfers\Transaksi\kirim\KirimConfirmationController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboardNew');
})->name('dashboard-new');

// Transfers

Route::prefix('transfer-kirim')->group(function () {
    Route::get('/', [TransferKirimController::class, 'TransferKirimIndex'])->middleware(['auth', 'verified'])->name('transfer-kirim.index');
    Route::post('/save', [TransferKirimController::class, 'saveTransferOption'])->middleware(['auth', 'verified'])->name('transfer-kirim.save');
});

Route::prefix('transfer-minta')->group(function () {
    Route::get('/', [TransferMintaController::class, 'TransferMintaIndex'])->middleware(['auth', 'verified'])->name('transfer-minta.index');
    Route::get('/share-page', [TransferMintaController::class, 'sharePage'])->middleware(['auth', 'verified'])->name('share-page.index');
});

Route::prefix('transfer-topup')->group(function () {
    Route::get('/', [TransferTopUpController::class, 'TransferTopUpIndex'])->middleware(['auth', 'verified'])->name('transfer-topup.index');
    Route::post('/transaksi-topup/store', [TopUpController::class, 'TopUpTransactionStore'])->name('transaksi-topup.store');
});

// Transaksi Top-Up

Route::prefix('transaksi-topup')->group(function () {
    Route::get('/', [TopUpController::class, 'TopUpTransactionIndex'])->middleware(['auth', 'verified'])->name('transaksi-topup.index');
    Route::post('/store', [TopUpController::class, 'TopUpTransactionStore'])->middleware(['auth', 'verified'])->name('transaksi-topup.store');
});

Route::prefix('topup-succeed')->group(function () {
    Route::get('/', [TopupSucceedController::class, 'SucceedIndex'])->middleware(['auth', 'verified'])->name('topup-succeed.index');
});

// Check PIN section

Route::prefix('check-pin')->group(function () {
    Route::get('/', [CheckPinController::class, 'CheckPinIndex'])->middleware(['auth', 'verified'])->name('check-pin.index');
    Route::post('/verify', [CheckPinController::class, 'verifyPin'])->middleware(['auth', 'verified'])->name('check-pin.verify');
});

// Check PIN section end

// Transaksi Top-Up end

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
    Route::post('/catatan/store', [CatatanController::class, 'store'])->name('catatan.store');
});

Route::prefix('catatan-daftar')->group(function () {
    Route::get('/', [CatatanDaftarController::class, 'index'])->middleware(['auth', 'verified'])->name('catatan-daftar.index');
});

Route::prefix('catatan-kategori')->group(function () {
    Route::get('/', [CatatanKategoriController::class, 'index'])->middleware(['auth', 'verified'])->name('catatan-kategori.index');
});
// Catatan End

// Top UP

Route::prefix('topup')->group(function () {
    Route::get('/', [TransferTopUpController::class, 'TransaksiTopUp'])->middleware(['auth', 'verified'])->name('topup.index');
    Route::post('/pilih-metode', [TransferTopUpController::class, 'PilihMetodeTopUp'])->middleware(['auth', 'verified'])->name('topup.pilih-metode');
    Route::get('/transaksi', [TransferTopUpController::class, 'TransaksiTopUp'])->middleware(['auth', 'verified'])->name('transaksi-topup');
});

// Top UP End

// Kirim

Route::prefix('kirim')->group(function () {
    Route::get('/', [TransaksiKirimController::class, 'TransaksiKirimIndex'])->middleware(['auth', 'verified'])->name('kirim.index');
    Route::post('/store', [TransaksiKirimController::class, 'store'])->middleware(['auth', 'verified'])->name('kirim.store');
});

// confirmation

Route::prefix('kirim-confirmation')->group(function () {
    Route::get('/', [KirimConfirmationController::class, 'KirimConfirmationIndex'])->middleware(['auth', 'verified'])->name('kirim-confirmation.index');
    Route::post('/fill-status', [KirimConfirmationController::class, 'FillStatus'])->middleware(['auth', 'verified'])->name('kirim-confirmation.FillStatus');

});

// confirmation end

// Kirim Succeed

Route::prefix('kirim-succeed')->group(function () {
    Route::get('/', [KirimSucceedController::class, 'KirimSucceedIndex'])->middleware(['auth', 'verified'])->name('kirim-succeed.index');
});

// Kirim Succeed End

// Kirim end

// Investasi

Route::prefix('investasi')->group(function () {
    Route::get('/', [InvestasiController::class, 'index'])->middleware(['auth', 'verified'])->name('investasi.index');
});

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
