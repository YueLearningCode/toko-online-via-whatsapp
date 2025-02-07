<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check() ? redirect()->route('home') : view('welcome');
});

Route::get('login', function () {
    return view('auth.login');
})->name('login');

// Menampilkan form registrasi
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

Route::post('register', [RegisteredUserController::class, 'store']);

// Sertakan rute dari auth.php
require __DIR__.'/auth.php';




Route::middleware('auth')->group(function () {
    Route::get('/home', [ShopController::class, 'index'])
        ->middleware('auth')
        ->name('home');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', [ShopController::class, 'index'])->name('home');
Route::get('/keranjang', [ShopController::class, 'keranjang'])->name('keranjang');
Route::post('/add-to-keranjang', [ShopController::class, 'addToKeranjang'])->name('add-to-keranjang');
Route::post('/update-keranjang', [ShopController::class, 'updateKeranjang'])->name('update-keranjang');
Route::get('/remove-from-keranjang/{id}', [ShopController::class, 'removeFromKeranjang'])->name('remove-from-keranjang');
Route::get('/halamantambah', [ShopController::class, 'halamantambah'])->name('halamantambah');
Route::post('/tambah-product', [ShopController::class, 'tambahProduct'])->name('tambah-product');

