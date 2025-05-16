<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- Tambahkan ini
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; // ini pakai trait HasFactory

    protected $fillable = ['title', 'content'];
}
