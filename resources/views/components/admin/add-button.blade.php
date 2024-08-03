<div class="px-6 py-4 rounded-[10px] border border-solid border-greenBi/20">
    <a href="{{ $href }}" 
        class="group relative z-[1] w-fit rounded-[10px] 
        flex items-center bg-greenBi overflow-hidden px-4 py-2">
        
        <span class="absolute -z-[1 w-[300px] h-[300px] top-1/2 left-1/2 
            -translate-x-1/2 -translate-y-1/2 scale-0 rounded-full
            ease-linear duration-300 group-hover:bg-blackBi group-hover:scale-100"></span>
    
        <span class="relative z-[2] text-white text-base capitalize">{{ $name }}</span>
    </a>
</div>