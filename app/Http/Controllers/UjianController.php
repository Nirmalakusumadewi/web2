<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UjianController extends Controller
{
    public function hasilUjian()
    {
        $siswa = [
            ['nama' => 'Rani', 'nilai' => 85, 'lulus' => true],
            ['nama' => 'Surya', 'nilai' => 90, 'lulus' => true],
            ['nama' => 'Budi', 'nilai' => 65, 'lulus' => false],
            ['nama' => 'Jaya', 'nilai' => 73, 'lulus' => true],
            ['nama' => 'Yudis', 'nilai' => 60, 'lulus' => false]
        ];
        
        return view('hasil-ujian', compact('siswa'));
    }
}