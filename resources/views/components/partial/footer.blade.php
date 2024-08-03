<footer class="flex justify-center">
    <div class="container max-w-1200 px-4 py-20">
        <div class="flex flex-col gap-8">
            <div class="flex justify-between items-center">
                {{-- Logo --}}
                @include('user.section.navigasi.logo')

                {{-- Navigasi --}}
                @include("user.section.navigasi.nav")

                {{-- Sosmed --}}
                @include('user.section.navigasi.sosmed')
            </div>

            <div class="text-center">
                <p class="text-grayBi text-sm font-medium capitalize">{{ env("APP_NAME") }} ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>