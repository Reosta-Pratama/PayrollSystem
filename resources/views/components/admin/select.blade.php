<select id="{{ $id }}" name="{{ $name }}" @if($isRequired) required @endif
    class="capitalize w-full h-10 pr-20 rounded-[10px] px-2
    border border-solid border-greenBi/20 
    focus:border-greenBi focus:border-opacity-100">
    {{ $slot }}
</select>