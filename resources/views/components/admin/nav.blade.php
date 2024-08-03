<nav class="flex flex-col flex-1 gap-6 px-5 overflow-y-scroll">
    {{-- Nav Data --}}
    @foreach (config("navAdmin") as $item)
        <div class="flex flex-col gap-0">
            <h2 class="font-jost text-xs text-greenBi font-semibold uppercase">
                {{ $item["judul"] }}
            </h2>

            <ul class="flex flex-col gap-1">
                @foreach ($item["daftar"] as $nav)
                    <li class="group">
                        <a href="{{ $nav['alamat'] }}" 
                            class="flex items-center gap-4 px-3 py-2 rounded-[10px] 
                            ease-in-out duration-300 group-hover:bg-greenBi 
                            {{ Request::path() == ltrim($nav["alamat"], '/') ? 'bg-greenBi' : 'bg-white' }}">
                            
                            <span class="text-base
                                ease-in-out duration-300 group-hover:text-white
                                {{ Request::path() == ltrim($nav["alamat"], '/') ? 'text-white' : 'text-blackBi' }}">
                                    {!! $nav['icon'] !!}
                            </span>

                            <span class="text-sm capitalize 
                                ease-in-out duration-300 group-hover:text-white
                                {{ Request::path() == ltrim($nav["alamat"], '/') ? 'text-white' : 'text-blackBi' }}">
                                    {{ $nav['nama'] }}
                            </span>

                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach

    {{-- Nav Admin --}}
    @if (Auth::user()->role == 'master')
        <div class="flex flex-col gap-0">
            <h2 class="font-jost text-xs text-greenBi font-semibold uppercase">
                administrator
            </h2>

            <ul class="flex flex-col">
                <li class="group">
                    <a href="{{ route('admin.admin') }}" 
                        class="flex items-center gap-4 px-3 py-2 rounded-[10px]
                        ease-in-out duration-300 group-hover:bg-greenBi
                        {{ Request::path() == ltrim('/admin/kelola-admin', '/') ? 'bg-greenBi' : 'bg-white' }}">

                        <span class="text-base text-blackBi
                        ease-in-out duration-300 group-hover:text-white
                        {{ Request::path() == ltrim('/admin/kelola-admin', '/') ? 'text-white' : 'text-blackBi' }}">
                            <i class="fa-solid fa-user-gear"></i>
                        </span>

                        <span class="text-sm text-blackBi capitalize
                        ease-in-out duration-300 group-hover:text-white
                        {{ Request::path() == ltrim('/admin/kelola-admin', '/') ? 'text-white' : 'text-blackBi' }}">
                            admin
                        </span>
                        
                    </a>
                </li>
            </ul>
        </div>
    @endif
</nav>