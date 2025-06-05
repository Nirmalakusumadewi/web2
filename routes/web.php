<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetingController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UjianController;

// Route untuk home (pilih salah satu, misal 'home')
Route::get('/', function () {
    return view('home');
});

// Route untuk greeting
Route::get('/greeting', [GreetingController::class, 'index']);

// Route untuk daftar siswa
Route::get('/daftar-siswa', [SiswaController::class, 'daftarSiswa']);

// Route untuk profile
Route::get('/profile', [DashboardController::class, 'profile']);

// Route untuk hasil ujian
Route::get('/hasil-ujian', [UjianController::class, 'hasilUjian']);