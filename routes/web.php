<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// 1. Routing 1 parameter
Route::get('/mahasiswa/{nama}', function ($nama) {
    return "Tampilkan data mahasiswa bernama $nama";
});

// Halaman statis
Route::get('/biodata', function () {
    return view('biodata');
});

// 2. Routing 2 parameter
Route::get('/stok_barang/{barang}/{merk}', function ($barang, $merk) {
    return "Cek sisa stok untuk $barang $merk";
});

// Halaman nama
Route::get('/namasaya', function () {
    echo "Nirmala Kusuma Dewi";
});

// 3. Routing dengan default parameter
Route::get('/stok_barang/{barang?}/{merk?}', function ($barang = 'smartphone', $merk = 'samsung') {
    return "Cek sisa stok untuk $barang $merk";
});

// Route parameter dinamis
Route::get('/matakuliah/{mk}', function ($mk) {
    echo "Matakuliah: " . $mk;
});

// 4. Routing filter angka saja
Route::get('/user_angka/{id}', function ($id) {
    return "Tampilkan user dengan id = $id";
})->where('id', '[0-9]+');

// Halaman mahasiswa
Route::get('/mahasiswa/{mhs}', function ($mhs) {
    echo "Tampilkan data mahasiswa bernama: " . $mhs;
});

// Optional parameter
Route::get('/stok_barang/{brng?}/{stok?}', function ($brng = 'kipas', $stok = 'samsung') {
    echo "Cek sisa stok: " . $brng . " = " . $stok;
});

// Constraint route
Route::get('/user1/{id}', function ($id) {
    echo "Tampilkan user dengan ID: " . $id;
})->whereNumber('id');

Route::get('/user/{id}', function ($id) {
    echo "Tampilkan user dengan ID: " . $id;
})->where('id', '[a-zA-Z]{2}[0-9]+');

// 5. Routing filter id 2 huruf + angka
Route::get('/user_kode/{id}', function ($id) {
    return "Tampilkan user dengan id = $id";
})->where('id', '^[A-Za-z]{2}[0-9]+$');

// Resource controller untuk Post
Route::resource('posts', PostController::class);