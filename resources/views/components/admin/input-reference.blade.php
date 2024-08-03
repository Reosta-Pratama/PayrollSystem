<input 
    id="{{ $id }}" name="{{ $name }}" type="{{ $type }}" 
    value="{{ is_array($value) ? implode(', ', $value) : $value }}" 
    @if($isRequired) required @endif
    placeholder="{{ $placeholder }}" 
    autocomplete="off"
    class="w-full h-10 flex px-4  text-base text-blackBi rounded-[10px]
        border border-solid border-greenBi/20 
        focus:border-greenBi focus:border-opacity-100">