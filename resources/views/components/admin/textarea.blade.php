<textarea
    id="{{ $id }}"
    name="{{ $name }}"
    @if($isRequired) required @endif
    class="h-40 flex px-4  text-base text-blackBi rounded-[10px]
        border border-solid border-greenBi/20
    focus:border-greenBi focus:border-opacity-100">{{ $value }}</textarea>