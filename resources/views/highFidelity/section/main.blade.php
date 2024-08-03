<aside class="phone:fixed lg-phone:sticky z-10 top-0 
    phone:-left-[100%] lg-tab:left-0 
    phone:h-full lg-phone:h-screen lg-phone:max-h-screen">

    <div
        id="close-container-aside"
        class="phone:bg-blackBi/40 phone:absolute phone:z-[1] 
            phone:top-0 phone:left-0 phone:w-screen phone:h-full hidden"></div>

    <div id="container-aside" 
        class="bg-white relative z-[2] 
            w-[270px] max-w-[270px] h-full 
            border-r border-solid border-greenBi/20
            ease-in-out duration-300">

        <div class="select-none h-full flex flex-col gap-8 py-5">
            {{-- Logo --}}
            <div class="flex justify-center items-center px-5">
                <div>
                    <h1 class="text-3xl font-semibold uppercase">{{ env("APP_NAME") }}</h1>
                </div>
            </div>
    
            {{-- User --}}
            <div class="flex flex-col items-center gap-6 px-5">
                <div class="w-24 h-24">
                    <img src="{{ Auth::user()->profile_photo_path ? asset(Auth::user()->profile_photo_path) : Auth::user()->profile_photo_url }}" 
                        alt="{{ Auth::user()->name }}" loading="lazy"
                        class="w-full h-full bg-creamBi object-cover object-center rounded-full
                            border border-solid border-greenBi/20">
                </div>
    
                <div class="flex flex-col text-center">
                    <span class="text-sm text-blackBi font-medium capitalize">{{ Auth::user()->name }}</span>
                    <span class="text-sm text-grayBi">{{ Auth::user()->email }}</span>
                </div>
            </div>
    
            {{-- List Nav --}}
            <x-admin.nav></x-admin.nav>
        </div>
    </div>
</aside>
