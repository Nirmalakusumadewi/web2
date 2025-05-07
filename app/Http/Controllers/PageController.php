<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        // Akan menampilkan file resources/views/about.blade.php
        return view('about');
    }
}
