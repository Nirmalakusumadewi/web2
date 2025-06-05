@extends('layouts.dashboard')

@section('title', 'Profile')

@section('content')
<div class="profile-container">
    <h2>Profil Pengguna</h2>
    
    {{-- Menggunakan komponen alert --}}
    <x-alert type="success" message="Profil berhasil dimuat!" />
    
    <div class="profile-info">
        <div class="info-item">
            <strong>Nama:</strong> {{ $user['nama'] }}
        </div>
                <div class="info-item">
            <strong>NIM:</strong> {{ $user['nim'] }}
                </div>
        <div class="info-item">
            <strong>Email:</strong> {{ $user['email'] }}
        </div>
        <div class="info-item">
            <strong>Alamat:</strong> {{ $user['alamat'] }}
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .profile-container { max-width: 600px; }
    .info-item { margin-bottom: 15px; padding: 10px; background-color: #f9f9f9; border-radius: 5px; }
</style>
@endpush

@push('scripts')
<script>
    // Script khusus untuk halaman profile
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Profile page loaded');
        
        // Animasi untuk info items
        const infoItems = document.querySelectorAll('.info-item');
        infoItems.forEach((item, index) => {
            setTimeout(() => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                item.style.transition = 'all 0.5s ease';
                
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 100);
            }, index * 200);
        });
    });
</script>
@endpush