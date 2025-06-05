<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class GreetingController extends Controller
{
    public function index()
    {
        $pesan = "Selamat Belajar Laravel Blade";
        return view('greeting', compact('pesan'));
    }
}