<nav>
    {{ Auth::user()->email }}

    <ul>
        <li>
            <a href="{{ route('pegawai.list') }}">
                pegawai
            </a>
        </li>

        <li>
            <a href="{{ route('gaji.list') }}">
                gaji
            </a>
        </li>

        <li>
            <a href="{{ route('jadwalKerja.list') }}">
                jadwal kerja
            </a>
        </li>

        <li>
            <a href="{{ route('absensi.list') }}">
                absensi
            </a>
        </li>

        <li>
            <a href="{{ route('pegawai.list') }}">
                laporan
            </a>
        </li>

        <li>
            <a href="{{ route('logout') }}">
                keluar
            </a>
        </li>
    </ul>
</nav>