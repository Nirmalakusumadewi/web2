<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function profile()
    {
        $user = [
            'nama' => 'Nirmala Kusuma Dewi',
            'nim' => 'SI20230027',
            'email' => 'nirma@gmail.com',
            'alamat' => 'Jl. Selebung Langko',
        ];
        
        return view('profile', compact('user'));
    }
}