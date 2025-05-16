@if (isset($post))
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <a href="{{ route('posts.index') }}">Kembali</a>
@endif

@if (isset($mahasiswa))
    <!DOCTYPE html>
    <html>
    <head>
        <title>Detail Mahasiswa</title>
    </head>
    <body>
        <h1>Detail Mahasiswa</h1>
        <p><strong>Nama Lengkap:</strong> {{ $mahasiswa->nama_lengkap }}</p>
        <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
        <p><strong>Program Studi:</strong> {{ $mahasiswa->program_studi }}</p>
        <p><strong>Angkatan:</strong> {{ $mahasiswa->angkatan }}</p>
        <a href="{{ route('posts.index') }}">Kembali</a>
    </body>
    </html>
@endif
