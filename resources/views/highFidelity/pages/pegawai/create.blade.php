<x-admin-layout>
    {{-- Isi CSS --}}
    @push('stylesheet')
        {{-- Seo --}}
        <meta name="description" content="deskripsi beranda)">
        <meta name="keywords" content="beranda biolobi">
        <title>Tambah Pegawai - {{ env("APP_NAME") }}</title>

        {{-- Plugin --}}
    @endpush

    {{-- Isi halaman disini --}}
    <x-admin.title name="tambah pegawai"></x-admin.title>

    <x-admin.card-input>
        <x-admin.form-default
            id="formTopic"
            action="{{ route('pegawai.insert.saving') }}"
            isMultipart="true">
            <x-admin.container-input>
                <x-admin.content-input>
                    <x-admin.label for="email" name="email"></x-admin.label>
                    <x-admin.input
                        id="email"
                        name="email"
                        type="email"
                        :value="old('email')"
                        :isRequired="true">
                    </x-admin.input>

                    @error('email')
                        <x-admin.error message="{{ $message }}"></x-admin.error>
                    @enderror
                </x-admin.content-input>

                <x-admin.content-input>
                    <x-admin.label for="role" name="role"></x-admin.label>
                    <x-admin.select id="role" name="role" :isRequired="true">
                        @foreach (['pegawai', 'admin'] as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </x-admin.select>

                    @error('role')
                        <x-admin.error message="{{ $message }}"></x-admin.error>
                    @enderror
                </x-admin.content-input>
            </x-admin.container-input>

            <x-admin.container-input>
                <x-admin.content-input>
                    <x-admin.label for="nama" name="nama"></x-admin.label>
                    <x-admin.input
                        id="nama"
                        name="nama"
                        type="text"
                        :value="old('nama')"
                        :isRequired="true">
                    </x-admin.input>

                    @error('nama')
                        <x-admin.error message="{{ $message }}"></x-admin.error>
                    @enderror
                </x-admin.content-input>

                <x-admin.content-input>
                    <x-admin.label for="alamat" name="alamat"></x-admin.label>
                    <x-admin.input
                        id="alamat"
                        name="alamat"
                        type="text"
                        :value="old('alamat')"
                        :isRequired="true">
                    </x-admin.input>

                    @error('alamat')
                        <x-admin.error message="{{ $message }}"></x-admin.error>
                    @enderror
                </x-admin.content-input>

                <x-admin.content-input>
                    <x-admin.label for="tanggalLahir" name="tanggalLahir"></x-admin.label>
                    <x-admin.input
                        id="tanggalLahir"
                        name="tanggalLahir"
                        type="date"
                        :value="old('tanggalLahir')"
                        :isRequired="true">
                    </x-admin.input>

                    @error('tanggalLahir')
                        <x-admin.error message="{{ $message }}"></x-admin.error>
                    @enderror
                </x-admin.content-input>

                <x-admin.content-input>
                    <x-admin.label for="jenisKelamin" name="jenisKelamin"></x-admin.label>
                    <x-admin.select id="jenisKelamin" name="jenisKelamin" :isRequired="true">
                        <option value="l">Laki-laki</option>
                        <option value="p">Perempuan</option>
                    </x-admin.select>


                    @error('jenisKelamin')
                        <x-admin.error message="{{ $message }}"></x-admin.error>
                    @enderror
                </x-admin.content-input>

                <x-admin.content-input>
                    <x-admin.label for="noTelepon" name="noTelepon"></x-admin.label>
                    <x-admin.input
                        id="noTelepon"
                        name="noTelepon"
                        type="text"
                        :value="old('noTelepon')"
                        :isRequired="true">
                    </x-admin.input>

                    @error('noTelepon')
                        <x-admin.error message="{{ $message }}"></x-admin.error>
                    @enderror
                </x-admin.content-input>

                <x-admin.content-input>
                    <x-admin.label for="jabatan" name="jabatan"></x-admin.label>
                    <x-admin.input
                        id="jabatan"
                        name="jabatan"
                        type="text"
                        :value="old('jabatan')"
                        :isRequired="true">
                    </x-admin.input>

                    @error('jabatan')
                        <x-admin.error message="{{ $message }}"></x-admin.error>
                    @enderror
                </x-admin.content-input>

                <x-admin.content-input>
                    <x-admin.label for="tanggalMasuk" name="tanggalMasuk"></x-admin.label>
                    <x-admin.input
                        id="tanggalMasuk"
                        name="tanggalMasuk"
                        type="date"
                        :value="old('tanggalMasuk')"
                        :isRequired="true">
                    </x-admin.input>

                    @error('tanggalMasuk')
                        <x-admin.error message="{{ $message }}"></x-admin.error>
                    @enderror
                </x-admin.content-input>

                <x-admin.content-input>
                    <x-admin.label for="status" name="status"></x-admin.label>
                    <x-admin.select id="status" name="status" :isRequired="true">
                        @foreach (['aktif', 'nonaktif', 'cuti', 'kontrak'] as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </x-admin.select>

                    @error('status')
                        <x-admin.error message="{{ $message }}"></x-admin.error>
                    @enderror
                </x-admin.content-input>
            </x-admin.container-input>

            <x-admin.btn-tambah 
                href="{{ route('pegawai.list') }}" 
                type="submit" 
                name="tambah">
            </x-admin.btn-tambah>
        </x-admin.form-default>
    </x-admin.card-input>

    {{-- Isi Javascript --}}
    @push('scripts')

    @endpush
</x-admin-layout>