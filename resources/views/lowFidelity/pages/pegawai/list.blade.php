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

        <a href="{{ route('pegawai.insert') }}">
            tambah
        </a>

        <table>
            <thead>
                <tr>
                    <th>nama</th>
                    <th>role</th>
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
                        <td>{{ $pegawai->user->role }}</td>
                        <td>{{ $pegawai->jabatan }}</td>
                        <td>{{ $pegawai->tanggalMasuk }}</td>
                        <td>{{ $pegawai->status }}</td>
                        <td>
                            <a href="{{ route('pegawai.read', ['id'=>$pegawai->id]) }}">
                                update
                            </a>

                            <a href="{{ route('pegawai.delete', ['id'=>$pegawai->id]) }}">
                                hapus
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>