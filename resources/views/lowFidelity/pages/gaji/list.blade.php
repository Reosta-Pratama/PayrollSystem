<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        @include('lowFidelity.components.nav')

        @if (session('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>nama</th>
                    <th>jabatan</th>
                    <th>tanggal masuk</th>
                    <th>status</th>
                    <th>pengaturan</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pegawai as $pegawai)
                    <tr>
                        <td>{{ $pegawai->nama }}</td>
                        <td>{{ $pegawai->jabatan }}</td>
                        <td>{{ $pegawai->tanggalMasuk }}</td>
                        <td>{{ $pegawai->status }}</td>
                        <td>
                            <a href="{{ route('gaji.read', ['id'=>$pegawai->id]) }}">
                                gaji
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>