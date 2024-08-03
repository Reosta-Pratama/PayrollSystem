<button class="{{ $button }} relative group px-1 py-4">
    <span
        id="border"
        class="absolute bottom-[-1px] left-0 w-full duration-300 ease-in-out
            group-hover:border-b-2 group-hover:border-solid 
            group-hover:border-grayBi group-hover:border-opacity-50"></span>
    <span
        id="text"
        class="text-base text-blackBi font-medium capitalize
            duration-300 ease-in-out group-hover:text-grayBi">
        {{ $name }}
    </span>
</button>