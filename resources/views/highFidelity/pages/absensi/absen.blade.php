<x-admin-layout>
    {{-- Isi CSS --}}
    @push('stylesheet')
        {{-- Seo --}}
        <meta name="description" content="deskripsi beranda)">
        <meta name="keywords" content="beranda biolobi">
        <title>Absen - {{ env("APP_NAME") }}</title>

        {{-- Plugin --}}
    @endpush

    {{-- Isi halaman disini --}}
    <x-admin.title name="Absen"></x-admin.title>

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

    <div class="flex flex-1 phone:p-2 lg-phone:p-6 
        rounded-[10px] border border-solid border-greenBi/20">
        <div class="flex flex-col gap-5
            phone:w-full lg-phone:w-full">
            <div class="flex justify-center">
                <h2 id="current-time"
                    class="text-4xl font-semibold uppercase">
                </h2>
            </div>

            <div class="flex justify-center">
                <div class="flex gap-4">
                    <form action="{{ route('absensi.clockin') }}" 
                        method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-greenBi p-5 rounded-md">
                            <span class="text-white ">Clock In</span>
                        </button>
                    </form>

                    <form action="{{ route('absensi.clockout') }}" 
                        method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-greenBi p-5 rounded-md">
                            <span class="text-white ">Clock Out</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Isi Javascript --}}
    @push('scripts')
    <script>
        function updateTime() {
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var seconds = now.getSeconds().toString().padStart(2, '0');
            var currentTime = hours + ':' + minutes + ':' + seconds;
            document.getElementById('current-time').textContent = currentTime;
        }

        setInterval(updateTime, 1000);
        updateTime();
    </script>
    @endpush
</x-admin-layout>