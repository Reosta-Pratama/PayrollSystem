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

        <a href="{{ route('jadwalKerja.insert') }}">
            tambah
        </a>

        <table>
            <thead>
                <tr>
                    <th>hari</th>
                    <th>jam masuk</th>
                    <th>jam keluar</th>
                    <th>pengaturan</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($jadwalKerja as $jadwalKerja)
                    <tr>
                        <td>{{ $jadwalKerja->hari }}</td>
                        <td>{{ $jadwalKerja->jamMasuk }}</td>
                        <td>{{ $jadwalKerja->jamKeluar }}</td>
                        <td>
                            <ul>
                                <li>
                                    <a href="{{ route('jadwalKerja.read', ['id'=>$jadwalKerja->id]) }}">update</a>
                                </li>
                                <li>
                                    <a href="{{ route('jadwalKerja.delete', ['id'=>$jadwalKerja->id]) }}">delete</a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>