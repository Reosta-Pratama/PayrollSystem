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

        <form action="{{ route('gaji.insert', ['id'=>$pegawai->id]) }}" method="post">
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
                <input type="hidden" name="pegawaiID" value="{{ $pegawai->id }}">
                
                <div class="">
                    <label for="gajiPokok">gaji pokok</label>
                    <input type="text" name="gajiPokok" id="gajiPokok">
                </div>

                <div class="">
                    <label for="tunjangan">tunjangan</label>
                    <input type="text" name="tunjangan" id="tunjangan">
                </div>

                <div class="">
                    <label for="bonus">bonus</label>
                    <input type="text" name="bonus" id="bonus">
                </div>

                <div class="">
                    <label for="potongan">potongan</label>
                    <input type="text" name="potongan" id="potongan" readonly>
                </div>

                <div class="">
                    <label for="tanggalGaji">tanggalGaji</label>
                    <input type="date" name="tanggalGaji" id="tanggalGaji">
                </div>

                <div class="">
                    <label for="status">status</label>
                    <select name="status" id="status">
                        <option value="dibayar">dibayar</option>
                        <option value="belomDibayar">belomDibayar</option>
                    </select>
                </div>
            </div>

            <button type="submit">buat</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>tanggal</th>
                    <th>total gaji</th>
                    <th>status</th>
                    <th>pengaturan</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pegawai->gaji as $gaji)
                    <tr>
                        <td>{{ $gaji->tanggalGaji }}</td>
                        <td>Rp.{{ $gaji->gajiPokok + $gaji->tunjangan + $gaji->bonus - $gaji->potongan }}</td>
                        <td>{{ $gaji->status }}</td>
                        <td>
                            <a href="{{ route('gaji.delete', ['id'=>$gaji->id]) }}">
                                delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>