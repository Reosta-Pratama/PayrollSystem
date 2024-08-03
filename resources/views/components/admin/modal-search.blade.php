<div
    id="modal"
    class="modal absolute z-20
        w-full h-screen invisible opacity-0">

    <div
        class="modal-cover absolute z-[1] top-0 left-0
        w-full h-full bg-blackBi/30"></div>

    <div class="absolute z-[2] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full">
        <div class="w-full h-full flex justify-center items-center">
            <div
                class="bg-white phone:w-[80%] lg-phone:w-[60%] 
                    flex flex-col shadow-bibi 
                    gap-6 py-6 rounded-[10px]">
                <div
                    class="flex items-center gap-8 px-6 pb-6
                        border-b border-solid border-greenBi/20">
                    <div class="flex flex-1">
                        <input
                            id="live-search"
                            name="live-search"
                            type="text"
                            placeholder="Cari menu disini"
                            class="w-full h-10 flex px-4 text-base text-blackBi rounded-[10px]
                                border border-solid border-greenBi/20
                                focus:border-greenBi focus:border-opacity-100">
                    </div>

                    <div>
                        <button
                            class="close group w-10 h-10 flex justify-center items-center rounded-full cursor-pointer
                            ease-in-out duration-300 hover:bg-greenBi">
                            <span
                                class="text-xl text-blackBi ease-in-out duration-300 group-hover:text-white">
                                <i class="fa-solid fa-xmark"></i>
                            </span>
                        </button>
                    </div>
                </div>

                {{-- Input pencarian --}}
                <?php
                    $routeNames = [];
                    foreach (\Route::getRoutes() as $route) {
                        if (Str::startsWith($route->getName(), 'admin.')) {
                            $routeNames[] = $route->getName();
                        }
                    }

                    sort($routeNames); 
                ?>

                <ul
                    id="isi-pencarian"
                    class="phone:h-80 phone:max-h-80 lg-phone:h-60 lg-phone:max-h-60 tablet:h-96 tablet:max-h-96 
                        flex flex-col px-6 overflow-y-scroll">
                    @foreach ($routeNames as $routeName)
                        <?php
                                $parts = explode('.', $routeName);
                                array_shift($parts);
                                $cleanName = implode(' ', $parts);
                                $uris = [];

                                foreach (\Route::getRoutes() as $route) {
                                    if ($route->getName() === $routeName) {
                                        $uris[] = $route->uri;
                                    }
                                }
                        ?>

                        <li>
                            <a
                                href="{{ route($routeName) }}"
                                class="group flex flex-col gap-0 py-3 rounded-[10px] ease-in-out duration-300 hover:bg-greenBi">
                                <span
                                    class="nav-name ease-in-out duration-300 group-hover:text-white
                                        px-2  text-base text-blackBi font-medium capitalize">
                                    {{ $cleanName }}
                                </span>
                                <span
                                    class="ease-in-out duration-300 group-hover:text-white
                                        px-2  text-sm text-grayBi">
                                    @foreach ($uris as $uri)
                                    {{ $uri }}
                                    @endforeach
                                </span>
                            </a>
                        </li>
                    @endforeach

                    <span
                        id="no-data-message"
                        class="text-base text-redBi font-medium capitalize hidden">
                        mohon maaf, data tidak ditemukan
                    </span>
                </ul>
            </div>
        </div>
    </div>
</div>