<div class="relative w-full phone:h-[200px] lg-phone:h-[400px]">
    <div class="absolute z-[1] top-0 left-0 w-full h-full 
        bg-blackBi/40 rounded-[10px]"></div>

    @if ($photo != null)
        {{-- Old photo --}}
        <input type="hidden" name="{{ $oldDestination }}" id="{{ $oldDestination }}" value="{{ $photo }}">

        <img src="{{ asset($photo) }}" 
            alt="Gambar {{ $name }}"
            loading="lazy"
            class="w-full h-full object-cover origin-center rounded-[10px]">
    @endif

    <label for="{{ $newDestination }}"
        class="absolute z-[2] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <p class="bg-greenBi px-4 py-2 rounded-[10px] 
            text-base text-white cursor-pointer
            ease-in-out duration-300 hover:bg-blackBi">
            Pilih Gambar
        </p>
    </label>

    <input type="file" name="{{ $newDestination }}" id="{{ $newDestination }}" @if($isRequired) required @endif class="hidden">
</div>