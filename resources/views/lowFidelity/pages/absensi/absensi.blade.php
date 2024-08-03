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
        
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('absensi.clockin') }}" method="post">
            @csrf
            <div>
                <input type="hidden" name="pegawaiID" id="pegawaiID" value="2" readonly>
            </div>

            <div>
                <label for="clockin">clockin</label>
                <input type="time" name="clockin" id="clockin">
            </div>

            <button type="submit">buat</button>
        </form>

        <form action="{{ route('absensi.clockout') }}" method="post">
            @csrf
            <div>
                <input type="hidden" name="pegawaiID" id="pegawaiID" value="2" readonly>
            </div>

            <div>
                <label for="clockout">clockout</label>
                <input type="time" name="clockout" id="clockout">
            </div>

            <button type="submit">buat</button>
        </form>
    </body>
</html>