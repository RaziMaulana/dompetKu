<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboardNew');
})->name('dashboard-new');

Route::get('/transfer-minta', function () {
    return view('transfers.transfer-minta');
})->middleware(['auth', 'verified'])->name('transfer-minta');

Route::get('/transfer-dashboard', function () {
    return view('transfers.transfer-dashboard');
})->middleware(['auth', 'verified'])->name('transfer-dashboard');

Route::get('/transfer-topup', function () {
    return view('transfers.transfer-topup');
})->middleware(['auth', 'verified'])->name('transfer-topup');

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

require __DIR__.'/auth.php';
