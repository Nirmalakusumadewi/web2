<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
    <!-- Jika pakai Bootstrap, bisa tambah link CSS-nya di sini -->
    <style>
        /* Contoh styling sederhana untuk alert */
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
    </style>
</head>
<body>

<h1>Daftar Mahasiswa</h1>

<a href="{{ route('mahasiswa.create') }}">Tambah Mahasiswa</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Lengkap</th>
            <th>NIM</th>
            <th>Program Studi</th>
            <th>Angkatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($mahasiswas as $mhs)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mhs->nama_lengkap }}</td>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->program_studi }}</td>
                <td>{{ $mhs->angkatan }}</td>
                <td>
                    <a href="{{ route('mahasiswa.show', $mhs->id) }}">Lihat</a> |
                    <a href="{{ route('mahasiswa.edit', $mhs->id) }}">Edit</a> |
                    <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none; color:red; cursor:pointer;">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" style="text-align:center;">Belum ada data mahasiswa.</td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>
