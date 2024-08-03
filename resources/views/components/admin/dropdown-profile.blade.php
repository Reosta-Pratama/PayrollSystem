<a
    href="{{ $href }}"
    class="group h-12 flex items-center gap-4 px-4 ease-in-out duration-300 @if($name == "keluar") hover:bg-redBi @else hover:bg-greenBi @endif">
    <span
        class="text-sm text-blackBi 
            ease-in-out duration-300 group-hover:text-white">
        {{ $icon }}
    </span>
    <span
        class="phone:text-xs lg-phone:text-sm text-blackBi capitalize
        ease-in-out duration-300 group-hover:text-white">{{ $name }}</span>
</a>