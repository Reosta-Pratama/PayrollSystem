<x-admin-layout>
    {{-- Isi CSS --}}
    @push('stylesheet')
        {{-- Seo --}}
        <meta name="description" content="deskripsi beranda)">
        <meta name="keywords" content="beranda biolobi">
        <title>Edit Jadwal Kerja - {{ env("APP_NAME") }}</title>
    @endpush

    {{-- Isi halaman disini --}}
    <x-admin.title name="edit Jadwal Kerja / {{ $jadwalKerja->id }}"></x-admin.title>

    <x-admin.card-input>
        <x-admin.form-default
            id="formTopic"
            action="{{ route('jadwalKerja.update', ['id'=>$jadwalKerja->id]) }}">
            <x-admin.container-input>
                <x-admin.content-input>
                    <x-admin.label for="hari" name="hari"></x-admin.label>
                    <x-admin.select id="hari" name="hari" :isRequired="true">
                        @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'] as $day)
                            <option value="{{ $day }}" {{ $jadwalKerja->hari === $day ? 'selected' : '' }}>{{ $day }}</option>
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
                        :value="$jadwalKerja->jamMasuk"
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
                        :value="$jadwalKerja->jamKeluar"
                        :isRequired="true">
                    </x-admin.input>

                    @error('jamKeluar')
                        <x-admin.error message="{{ $message }}"></x-admin.error>
                    @enderror
                </x-admin.content-input>
            </x-admin.container-input>

            <x-admin.btn-edit 
                href="{{ route('jadwalKerja.list') }}" 
                type="submit" 
                name="simpan"
                hapus="{{ route('jadwalKerja.delete', ['id'=>$jadwalKerja->id]) }}">
            </x-admin.btn-edit>
        </x-admin.form-default>
    </x-admin.card-input>
</x-admin-layout>