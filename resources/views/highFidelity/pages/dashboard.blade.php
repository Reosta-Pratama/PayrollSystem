<x-admin-layout>
    {{-- Isi CSS --}}
    @push('stylesheet')
        {{-- Seo --}}
        <meta name="description" content="deskripsi beranda)">
        <meta name="keywords" content="beranda biolobi">
        <title>Dashboard - {{ env("APP_NAME") }}</title>

        {{-- Plugin --}}
    @endpush

    {{-- Isi halaman disini --}}
    <x-admin.title name="Dashboard"></x-admin.title>

    <div class="w-[60%]"></div>

    {{-- Isi Javascript --}}
    @push('scripts')

    @endpush
</x-admin-layout>