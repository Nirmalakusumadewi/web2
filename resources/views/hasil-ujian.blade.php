<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Ujian</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #000;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Hasil Ujian Siswa</h1>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nilai</th>
                <th>Kategori</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $s)
                <tr>
                    <td>{{ $s['nama'] }}</td>
                    <td>{{ $s['nilai'] }}</td>
                    <td>
                        @if($s['nilai'] >= 90)
                            Sangat Baik (A)
                        @elseif($s['nilai'] >= 80)
                            Baik (B)
                        @elseif($s['nilai'] >= 70)
                            Cukup (C)
                        @else
                            Kurang (D)
                        @endif
                    </td>
                    <td>
                        @if($s['lulus'])
                            Lulus
                        @else
                            Belum Lulus
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>