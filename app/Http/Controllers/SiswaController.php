<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function daftarSiswa()
    {
        $siswa = [
            ['nama' => 'Budi', 'Jurusan' => 'Teknik Informatika', 'NIM' => 'TI20230001'],
            ['nama' => 'Jaya ', 'Jurusan' => 'Sistem informasi', 'NIM' => 'SI20230025'],
            ['nama' => 'Yudis', 'Jurusan' => 'Teknik informatika', 'NIM' => 'TI20230005'],
            ['nama' => 'Rani', 'Jurusan' => 'Sistem Informasi', 'NIM' => 'SI20230065'],
            ['nama' => 'Surya', 'Jurusan' => 'Teknik informatika', 'NIM' => 'TI20230027'],


           
        ];
        
        return view('daftar_siswa', compact('siswa'));
    }
}