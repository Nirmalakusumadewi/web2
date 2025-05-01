<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('welcome');
});

Route::get('/namasaya', function () {
    return 'Nirmala Kusuma Dewi';
});

Route::get('/biodata', function () {
    return view('biodata');
});

Route::get('/matakuliah/{mk}', function ($mk) {
    return "Matakuliah :" . $mk;
});


//tugas

route::get('/mahasiswa/{nama}', function ($nama) {
    return "Tampilkan data mahasiswa bernama :" . ucfirst($nama);
});

Route::get('/stok_barang/{jenis}/{merek}', function ($jenis, $merek) {
    return "Cek sisa stok untuk $jenis $merek";
});

Route::get('/stok_barang/{jenis?}/{merek?}', function ($jenis = 'smartphone', $merek = 'samsung') {
    return "Cek sisa stok untuk $jenis $merek";
});


Route::get('/user/{id}', function ($id) {
    // Filter: pastikan hanya angka yang diizinkan
    if (!is_numeric($id)) {
        abort(404, "ID tidak valid");
    }
    return "Tampilkan user dengan id = $id";
});

Route::get('/user/{id}', function ($id) {
    return "Tampilkan user dengan id = $id";
})->where('id', '^[A-Za-z]{2}[0-9]+$');