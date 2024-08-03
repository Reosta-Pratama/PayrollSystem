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

        <form action="{{ route('pegawai.insert.saving') }}" method="post">
            @csrf @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="">
                <div class="">
                    <label for="email">email</label>
                    <input type="email" name="email" id="email">
                </div>

                <div>
                    <label for="role">role</label>
                    <select name="role" id="role">
                        @foreach (['pegawai', 'admin'] as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="">
                <div class="">
                    <label for="nama">nama</label>
                    <input type="text" name="nama" id="nama">
                </div>

                <div class="">
                    <label for="alamat">alamat</label>
                    <input type="text" name="alamat" id="alamat">
                </div>

                <div class="">
                    <label for="tanggalLahir">tanggal lahir</label>
                    <input type="date" name="tanggalLahir" id="tanggalLahir">
                </div>

                <div class="">
                    <label for="jenisKelamin">jenis kelamin</label>
                    <select name="jenisKelamin" id="jenisKelamin">
                        <option value="l">Laki-laki</option>
                        <option value="p">Perempuan</option>
                    </select>
                </div>

                <div class="">
                    <label for="noTelepon">noTelepon</label>
                    <input type="text" name="noTelepon" id="noTelepon">
                </div>

                <div class="">
                    <label for="jabatan">jabatan</label>
                    <input type="text" name="jabatan" id="jabatan">
                </div>

                <div class="">
                    <label for="tanggalMasuk">tanggalMasuk</label>
                    <input type="date" name="tanggalMasuk" id="tanggalMasuk">
                </div>

                <div class="">
                    <label for="status">status</label>
                    <select name="status" id="status">
                        @foreach (['aktif', 'nonaktif', 'cuti', 'kontrak'] as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="submit">buat</button>
        </form>
    </body>
</html>