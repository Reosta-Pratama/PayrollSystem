<!DOCTYPE html>
<html lang="en">
    <head>
        <x-partial.head></x-partial.head>
    </head>
    <body class="relative">
        <main>
            {{ $slot }}
        </main>

        @stack('scripts')
    </body>
</html>