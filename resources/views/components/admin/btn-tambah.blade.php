<div class="flex items-center gap-4">
    <a
        href="{{ $href }}"
        class="group relative z-[1] w-fit rounded-[10px]
            flex items-center bg-creamBi overflow-hidden 
            phone:px-5 phone:py-3 lg-phone:px-6 lg-phone:py-4
            border border-solid border-greenBi">
        <span
            class="w-[300px] h-[300px] absolute -z-[1] top-1/2 left-1/2 
            -translate-x-1/2 -translate-y-1/2 scale-0 rounded-full
            ease-linear duration-300 group-hover:bg-greenBi group-hover:scale-100"></span>

        <span
            class="relative z-[2] text-blackBi group-hover:text-white 
            phone:text-xs lg-phone:text-sm 
            font-medium tracking-[3.4px] uppercase
            ease-in-out duration-300">kembali</span>
    </a>

    <button
        type="{{ $type }}"
        class="group relative z-[1] w-fit rounded-[10px]
            flex items-center bg-greenBi overflow-hidden 
            phone:px-5 phone:py-3 lg-phone:px-6 lg-phone:py-4">
        <span
            class="w-[300px] h-[300px] absolute -z-[1] top-1/2 left-1/2
            -translate-x-1/2 -translate-y-1/2 scale-0 rounded-full
            ease-linear duration-300 group-hover:bg-blackBi group-hover:scale-100"></span>
        <span
            class="relative z-[2] text-white
            phone:text-xs lg-phone:text-sm 
            font-medium tracking-[3.4px] uppercase">
            {{ $name }}
        </span>
    </button>
</div>