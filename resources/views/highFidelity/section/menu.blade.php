<style>
    #myDropdown {
        display: none;
        transition: opacity 0.3s;
    }

    #myDropdown.show {
        display: block;
        animation: fadeDown 0.3s ease-in-out;
    }

    @keyframes fadeDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="relative z-10">
    <div class="flex items-center gap-2">
        <button
            id="dropdownProfile"
            class="group w-10 h-10 flex justify-center items-center rounded-full cursor-pointer
                ease-in-out duration-300 hover:bg-greenBi"
            onclick="toggleDropdown()">
            <span
                class="text-2xl text-blackBi ease-in-out duration-300 group-hover:text-white">
                <i class="fa-regular fa-circle-user"></i>
            </span>
        </button>
    </div>

    <ul
        id="myDropdown"
        class="absolute right-0 bg-white min-w-[160px] rounded-[10px] gap-4 
            border border-solid border-greenBi/20 
            shadow-bibi overflow-hidden">
        <li>
            <x-admin.dropdown-profile 
                href="" 
                name="edit password"
                icon='<i class="fa-solid fa-lock"></i>'>
            </x-admin.dropdown-profile>
        </li>
        <li>
            <x-admin.dropdown-profile 
                href="{{ route('logout') }}" 
                name="keluar"
                icon='<i class="fa-solid fa-right-from-bracket"></i>'>
            </x-admin.dropdown-profile>
        </li>
    </ul>
</div>

@push('scripts')
    <script src="{{ asset('assets/js/toggleProfile.js') }}"></script>
@endpush

