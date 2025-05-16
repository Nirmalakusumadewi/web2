@extends('layouts.app')

@section('content')
    <h1>Edit Data Mahasiswa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" 
                value="{{ old('nama_lengkap', $mahasiswa->nama_lengkap) }}" required>
        </div>

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" 
                value="{{ old('nim', $mahasiswa->nim) }}" required>
        </div>

        <div class="mb-3">
            <label for="program_studi" class="form-label">Program Studi</label>
            <input type="text" class="form-control" id="program_studi" name="program_studi" 
                value="{{ old('program_studi', $mahasiswa->program_studi) }}" required>
        </div>

        <div class="mb-3">
            <label for="angkatan" class="form-label">Angkatan</label>
            <input type="number" class="form-control" id="angkatan" name="angkatan" 
                value="{{ old('angkatan', $mahasiswa->angkatan) }}" required min="2000" max="{{ date('Y') }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
