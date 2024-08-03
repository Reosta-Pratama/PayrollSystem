<x-default-layout>
    {{-- Isi CSS --}}
    @push('stylesheet')
        {{-- Seo --}}
        <meta name="description" content="deskripsi beranda)">
        <meta name="keywords" content="beranda biolobi">
        <title>Masuk - {{ env("APP_NAME") }}</title>

    @endpush

    {{-- Isi halaman disini --}}
    <section class="phone:max-h-screen lg-phone:h-full tablet:h-full lg-tab:h-screen">
        <div class="w-full h-full 
            phone:flex phone:flex-col
            lg-phone:flex lg-phone:flex-col
            lg-tab:grid lg-tab:grid-cols-2">

            {{-- Desc Kiri --}}
            <div class="bg-creamBi flex justify-center items-center 
                phone:px-6 phone:py-6 lg-phone:px-6 lg-phone:py-6
                lg-tab:px-[90px] lg-tab:py-[100px]">

                <div class="w-full flex flex-col justify-center items-center gap-10">
                    <div class="w-[350px] h-[350px] 
                        phone:hidden lg-phone:hidden tablet:block">
                        <img
                            src="{{ asset('assets/img/employee.jpg') }}"
                            alt="Gambar login {{ asset('assets/img/employee.jpg') }}"
                            class="w-full h-full rounded-full object-cover object-center"
                            loading="lazy">
                    </div>

                    <div class="flex flex-col items-center gap-4">
                        <div class="relative -left-3 h-16 flex items-center">
                            <h1 class="text-blackBi text-4xl font-semibold uppercase">{{ env("APP_NAME") }}</h1>
                        </div>

                        <p class="phone:hidden lg-phone:hidden tablet:block
                            text-base text-blackBi text-center">
                            Ayo, Masuk ke Payroll System! 👋
                        </p>
                    </div>
                </div>
            </div>

            {{-- Form --}}
            <div class="flex phone:flex-1 justify-center lg-phone:items-center 
                phone:px-8 phone:py-8 lg-phone:px-8 lg-phone:py-8 lg-tab:px-[90px] lg-tab:py-[100px]">

                <form action="{{ route('login') }}" method="post" 
                    class="w-full flex flex-col gap-10">
                    @csrf
                    <h2 class="text-3xl text-blackBi font-medium uppercase">
                        Masuk
                    </h2>

                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col gap-2">
                            <label for="email" class="text-sm text-grayBi capitalize">alamat email</label>
                            <input id="email" name="email" type="email" value="{{ Cookie::get('email') }}" required autofocus
                                class="h-10 flex px-4 text-base text-blackBi rounded-[10px]
                                border border-solid border-greenBi/20 
                                focus:border-greenBi focus:border-opacity-100">

                            @error('email')
                                <span class="text-redBi" style="background: white;">{{$message}}</span>
                            @enderror 
                        </div>
                
                        <div class="flex flex-col gap-2">
                            <label for="password" class="text-sm text-grayBi capitalize">kata sandi</label>
                            <input id="password" name="password" type="password" value="{{ Cookie::get('password') }}" required
                                class="h-10 flex px-4 text-base text-blackBi rounded-[10px]
                                border border-solid border-greenBi/20 
                                focus:border-greenBi focus:border-opacity-100">

                            @error('password')
                                <span class="text-redBi" style="background: white;">{{$message}}</span>
                            @enderror 
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <input id="remember" name="remember" type="checkbox" {{ Cookie::get('check') == "on" ? 'checked' : '' }} 
                                class="rounded-sm">
                            <label for="remember" class="text-sm text-blackBi capitalize">ingatkan saya</label>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 items-center">
                        <button type="submit" class="group relative z-[1] w-fit rounded-[10px] 
                            flex items-center bg-greenBi overflow-hidden px-6 py-4">
                            <span class="absolute -z-[1 w-[300px] h-[300px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 scale-0 rounded-full
                                ease-linear duration-300 group-hover:bg-blackBi group-hover:scale-100"></span>
                        
                            <span class="relative z-[2] text-white text-xs font-medium tracking-[3.4px] uppercase">masuk</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-default-layout>