<h1>For</h1>
@for ($i = 1; $i <= 5; $i++)
<p>Laravel</p>
@endfor

<h1>Angka</h1>
@for ($i = 1; $i <= 5; $i++)
<p>{{ $i }}</p>
@endfor

<h1>Mahasiswa</h1>
{{ $nama }}
<h1>Matakuliah></h1>
@foreach ($matakuliah as $row)
<p>{{ $row }}</p>
@endforeach