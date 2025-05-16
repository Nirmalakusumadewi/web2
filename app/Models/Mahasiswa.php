<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    // Menentukan kolom yang dapat diisi secara mass-assignment
    protected $fillable = ['nama_lengkap', 'nim', 'program_studi', 'angkatan'];
}
