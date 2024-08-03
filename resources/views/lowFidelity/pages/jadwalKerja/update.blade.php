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

        <form action="{{ route('jadwalKerja.update', ['id'=>$jadwalKerja->id]) }}" method="post">
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
                <div>
                    <label for="hari">hari</label>
                    <select name="hari" id="hari">
                        @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'] as $day)
                            <option value="{{ $day }}" {{ $jadwalKerja->hari === $day ? 'selected' : '' }}>
                                {{ $day }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label for="jamMasuk">jamMasuk</label>
                    <input type="time" name="jamMasuk" id="jamMasuk" value="{{ $jadwalKerja->jamMasuk }}">
                </div>

                <div>
                    <label for="jamKeluar">jamKeluar</label>
                    <input type="time" name="jamKeluar" id="jamKeluar" value="{{ $jadwalKerja->jamKeluar }}">
                </div>
            </div>

            <button type="submit">buat</button>
        </form>
    </body>
</html>