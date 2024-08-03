<x-admin-layout>
    {{-- Isi CSS --}}
    @push('stylesheet')
        {{-- Seo --}}
        <meta name="description" content="deskripsi beranda)">
        <meta name="keywords" content="beranda biolobi">
        <title>Tambah Jadwal Kerja - {{ env("APP_NAME") }}</title>

        {{-- Plugin --}}
    @endpush

    {{-- Isi halaman disini --}}
    <x-admin.title name="tambah Jadwal Kerja"></x-admin.title>

    <x-admin.card-input>
        <x-admin.form-default
            id="formTopic"
            action="{{ route('jadwalKerja.insert.saving') }}"
            isMultipart="true">
            <x-admin.container-input>
                <x-admin.content-input>
                    <x-admin.label for="hari" name="hari"></x-admin.label>
                    <x-admin.select id="hari" name="hari" :isRequired="true">
                        @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'] as $day)
                            <option value="{{ $day }}">{{ $day }}</option>
                        @endforeach
                    </x-admin.select>

                    @error('hari')
                        <x-admin.error message="{{ $message }}"></x-admin.error>
                    @enderror
                </x-admin.content-input>

                <x-admin.content-input>
                    <x-admin.label for="jamMasuk" name="jamMasuk"></x-admin.label>
                    <x-admin.input
                        id="jamMasuk"
                        name="jamMasuk"
                        type="time"
                        :value="old('jamMasuk')"
                        :isRequired="true">
                    </x-admin.input>

                    @error('jamMasuk')
                        <x-admin.error message="{{ $message }}"></x-admin.error>
                    @enderror
                </x-admin.content-input>

                <x-admin.content-input>
                    <x-admin.label for="jamKeluar" name="jamKeluar"></x-admin.label>
                    <x-admin.input
                        id="jamKeluar"
                        name="jamKeluar"
                        type="time"
                        :value="old('jamKeluar')"
                        :isRequired="true">
                    </x-admin.input>

                    @error('jamKeluar')
                        <x-admin.error message="{{ $message }}"></x-admin.error>
                    @enderror
                </x-admin.content-input>
            </x-admin.container-input>

            <x-admin.btn-tambah 
                href="{{ route('jadwalKerja.list') }}" 
                type="submit" 
                name="tambah">
            </x-admin.btn-tambah>
        </x-admin.form-default>
    </x-admin.card-input>

    {{-- Isi Javascript --}}
    @push('scripts')

    @endpush
</x-admin-layout>