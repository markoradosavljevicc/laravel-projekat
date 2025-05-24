<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KotloviController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;


// 🟠 Početna stranica
Route::get('/', [HomeController::class, 'index'])->name('home');

// 🟠 Katalog
Route::get('/katalog', [KotloviController::class, 'index'])->name('katalog');

// 🟠 Prikaz jednog kotla
Route::get('/katalog/{id}', [KotloviController::class, 'show'])->name('kotlovi.show');

// 🟠 Servisi
Route::get('/svi-servisi', [ServisController::class, 'index'])->name('servisi.public');

Route::middleware(['auth'])->group(function () {
    Route::resource('/users', UserController::class)->except(['show']);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/kotlovi', \App\Http\Controllers\KotloviController::class)->except(['show']);
   Route::resource('servis', ServisController::class)->parameters([
    'servis' => 'servis'  // ručno postavi ime parametra
]);

Route::middleware(['auth'])->group(function () {
    Route::resource('narudzbine', \App\Http\Controllers\NarudzbinaController::class) ->parameters(['narudzbine' => 'narudzbina'])->except(['create', 'show']);
});







});

// 🟢 Dashboard za ulogovane korisnike
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// 🟢 Profil korisnika
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::view('/kontakt', 'kontakt')->name('kontakt');

// 🔐 Auth rute (login, register, password reset)
require __DIR__.'/auth.php';
