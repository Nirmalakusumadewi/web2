<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>

<h1>Form Tambah Mahasiswa</h1>

<a href="{{ route('mahasiswa.index') }}">← Kembali ke Daftar Mahasiswa</a>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('mahasiswa.store') }}" method="POST">
    @csrf
    <p>
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
    </p>
    <p>
        <label>NIM:</label><br>
        <input type="text" name="nim" value="{{ old('nim') }}">
    </p>
    <p>
        <label>Program Studi:</label><br>
        <input type="text" name="program_studi" value="{{ old('program_studi') }}">
    </p>
    <p>
        <label>Angkatan:</label><br>
        <input type="text" name="angkatan" value="{{ old('angkatan') }}">
    </p>
    <p>
        <button type="submit">Simpan</button>
    </p>
</form>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi</title>
</head>
<body>
    @yield('content')

    @include('partials.footer')
</body>
</html>

