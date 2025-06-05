@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div class="container">
    <h1>Selamat Datang di Laravel Blade</h1>
    
    {{-- Menggunakan komponen alert dengan berbagai tipe --}}
    <x-alert type="success" message="Selamat datang! Anda berhasil mengakses halaman home." />
    
    <x-alert type="info" message="Ini adalah contoh penggunaan komponen alert dengan tipe info." />
    
    <x-alert type="warning" message="Perhatian: Pastikan Anda sudah login untuk mengakses fitur lengkap." />
    
    <div class="content">
        <p>Halaman ini mendemonstrasikan penggunaan Laravel Blade dengan berbagai fitur:</p>
        <ul>
            <li>Layout dan Template Inheritance</li>
            <li>Komponen yang dapat digunakan kembali</li>
            <li>Conditional statements</li>
            <li>Loops dan iterasi</li>
            <li>Partials dan includes</li>
        </ul>
    </div>
</div>
@endsection