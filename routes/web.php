<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PostController;

// Route untuk halaman utama yang redirect ke /mahasiswa
Route::get('/', fn() => redirect('/mahasiswa'));

// Resource route untuk MahasiswaController
Route::resource('mahasiswa', MahasiswaController::class);

// Route lain untuk belajar routing dasar
Route::get('/halo', function() {
    return "Halo, selamat datang di laravel!";
});

Route::get('/about', function() {
    return "Ini adalah halaman about";
});

Route::post('/kirim', function() {
    return "Data berhasil dikirim!";
});

Route::put('/update', function() {
    return "Data berhasil di perbarui!";
});

Route::delete('/hapus', function() {
    return "Data berhasil dihapus!";
});

Route::get('/profile', function() {
    $user = [
        'nama' => 'Nirmala Kusuma Dewi',
        'pekerjaan' => 'Belum Kerja',
        'hobi' => 'Membaca'
    ];
    return response()->json($user);
});

// Rute untuk halaman home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

// Redirect ke /home
Route::get('/redirect', function() {
    return redirect('/home');
});

// Rute untuk welcome page
Route::get('/welcome', function() {
    return view('welcome');
});

// Rute dinamis untuk user berdasarkan ID
Route::get('/user/{id}', function ($id) {
    return "User ID: " . $id;
});

// Rute dinamis untuk produk berdasarkan kategori dan ID
Route::get('/produk/{kategori}/{id}', function ($kategori, $id) {
    return "Kategori: " . $kategori . " | Produk ID: " . $id;
});

// Rute dengan parameter opsional untuk nama
Route::get('/userr/{name?}', function ($name = "Guest") {
    return "Halo, " . $name;
});

// Rute dengan parameter ID untuk order
Route::get('/order/{id}', function ($id) {
    return "Order ID: " . $id;
})->where('id', '[0-9]+');

// Route untuk dashboard admin tanpa middleware auth, kalau mau tetap pakai admin prefix
Route::get('/admin/dashboard', function() {
    return "Ini halaman dashboard admin";
});

Route::get('/admin/dashboard/users', function() {
    return "Daftar Pengguna";
});

// Resource route untuk posts tanpa middleware auth
Route::resource('posts', MahasiswaController::class)->names('posts');
