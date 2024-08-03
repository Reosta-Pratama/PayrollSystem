<header id="header" class="header-absoulte z-10 
    bg-creamBi w-full flex justify-center
    phone:px-4 lg-phone:px-4 desk:px-0">
    
    <div
        id="header-container"
        class="absoulte-container container max-w-1200 
            flex justify-between items-center">
        
        {{-- Logo --}}
        @include('user.section.navigasi.logo')

        {{-- Navigasi --}}
        @include("user.section.navigasi.nav")

        <div class="flex items-center gap-4">
            {{-- Toggle Mobile Nav --}}
                <div id="toggleMobile" class="lg-phone:hidden">
                    <button type="button">
                        <span class="text-blackBi text-xl">
                            <i class="fa-solid fa-bars"></i>
                        </span>
                    </button>
                </div>

            {{-- Login --}}
            @if (!Auth::guard('student')->check())
                <div class="phone:hidden">
                    <x-user.btn-white
                        href="{{ route('loginStudent') }}"
                        id="login"
                        name="masuk"
                        font="text-sm font-medium tracking-[2.975px]"
                        class="h-14 px-9"
                        border="border border-solid border-greenBi">
                    </x-user.btn-white>
                </div>
            @else
                @include('user.section.navigasi.menu')
            @endif
        </div>
    </div>
</header>

{{-- Mobile nav --}}
@include('user.section.navigasi.mobile')

@push('scripts')
    <script src="{{ asset('assets/js/toggleHeader.js') }}"></script>
@endpush

