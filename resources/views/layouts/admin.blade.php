<!DOCTYPE html>
<html lang="en">
    <head>
        <x-partial.head></x-partial.head>
        <link rel="stylesheet" href="{{ asset('assets/plugin/Toastr/build/toastr.min.css') }}">
    </head>
    <body>
        <div class="body relative flex 
            phone:overflow-x-hidden">
            {{-- Aside Nav --}}
            @include('highFidelity.section.main')

            {{-- Main --}}
            <main class="flex flex-col flex-1 gap-6">
                <div
                    class="h-[70px] px-4 border-b border-solid border-greenBi/20">
                    <div class="h-full flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <button
                                type="button"
                                id="menu"
                                class="group w-10 h-10 flex justify-center items-center rounded-full cursor-pointer
                                    ease-in-out duration-300 hover:bg-greenBi">
                                <span
                                    class="text-xl text-blackBi ease-in-out duration-300 group-hover:text-white">
                                    <i class="fa-solid fa-bars"></i>
                                </span>
                            </button>
                        </div>

                        <div class="flex items-center gap-4">
                            <button
                                type="button"
                                id="search"
                                class="group w-10 h-10 flex justify-center items-center rounded-full cursor-pointer
                                    ease-in-out duration-300 hover:bg-greenBi">
                                <span
                                    class="text-xl text-blackBi ease-in-out duration-300 group-hover:text-white">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </span>
                            </button>

                            {{-- Menu dropdown profil --}}
                            @include('highFidelity.section.menu')
                        </div>
                    </div>
                </div>

                {{-- Isi halaman di $slot --}}
                <section class="flex flex-col justify-center items-center">
                    <div class="container max-w-1200 flex flex-col gap-6 px-6 pb-6">
                        {{ $slot }}
                    </div>
                </section>
            </main>

            {{-- Modal --}}
            <x-admin.modal-search></x-admin.modal-search>
        </div>

        <script
            type="text/javascript"
            charset="utf8"
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>

        <script src="{{ asset('assets/js/menuBurger.js') }}"></script>
        <script src="{{ asset('assets/js/modalSearch.js') }}"></script>
        <script src="{{ asset('assets/js/searchAdmin.js') }}"></script>

        @stack('scripts')
    </body>
</html>