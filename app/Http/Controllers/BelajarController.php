<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
    // Menampilkan view greeting dengan pesan
    public function greeting()
    {
        return view('greeting', ['Spesan' => 'Selamat Belajar Laravel Blade']);
    }

    // Menampilkan daftar siswa ke view
    public function daftarsiswa()
    {
        $siswa = ['Ahmad', 'Budi', 'Citra', 'Dina'];
        return view('daftar_siswa', compact('siswa'));
    }

    // Menampilkan profil dengan data lengkap
    public function profile()
    {
        return view('profile', [
            'nama' => 'Nirmala Kusuma Dewi',
            'email' => 'nirma@gmail.com',
            'alamat' => 'Jl. Selebung Langko No. 28',
            'nilai' => 86,
        ]);
    }

    // Menampilkan hasil ujian dengan nilai
    public function hasilUjian()
    {
        return view('hasil_ujian', ['nilai' => 65]);
    }
}
