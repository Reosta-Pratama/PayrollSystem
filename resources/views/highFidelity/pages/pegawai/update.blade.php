<x-admin-layout>
    {{-- Isi CSS --}}
    @push('stylesheet')
        {{-- Seo --}}
        <meta name="description" content="deskripsi beranda)">
        <meta name="keywords" content="beranda biolobi">
        <title>Edit Pegawai - {{ env("APP_NAME") }}</title>
    @endpush

    {{-- Isi halaman disini --}}
    <x-admin.title name="edit Pegawai / {{ $pegawai->id }}"></x-admin.title>

    <x-admin.card-input>
        <x-admin.form-default
            id="formTopic"
            action="{{ route('pegawai.update', ['id'=>$pegawai->id]) }}">
            <x-admin.container-input>
                <x-admin.content-input>
                    <x-admin.label for="email" name="email"></x-admin.label>
                    <x-admin.input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ $pegawai->user->email }}"
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
                            <option value="{{ $role }}"
                            {{ $pegawai->user->role == $role ? 'selected' : '' }}>
                                {{ $role }}
                            </option>
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
                        :value="$pegawai->nama"
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
                        :value="$pegawai->alamat"
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
                        :value="$pegawai->tanggalLahir"
                        :isRequired="true">
                    </x-admin.input>

                    @error('tanggalLahir')
                        <x-admin.error message="{{ $message }}"></x-admin.error>
                    @enderror
                </x-admin.content-input>

                <x-admin.content-input>
                    <x-admin.label for="jenisKelamin" name="jenisKelamin"></x-admin.label>
                    <x-admin.select id="jenisKelamin" name="jenisKelamin" :isRequired="true">
                        <option value="l" {{ $pegawai->jenisKelamin == 'l' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="p" {{ $pegawai->jenisKelamin == 'p' ? 'selected' : '' }}>Perempuan</option>
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
                        :value="$pegawai->noTelepon"
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
                        :value="$pegawai->jabatan"
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
                        :value="$pegawai->tanggalMasuk"
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
                            <option value="{{ $status }}"
                                {{ $pegawai->status == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </x-admin.select>

                    @error('status')
                        <x-admin.error message="{{ $message }}"></x-admin.error>
                    @enderror
                </x-admin.content-input>
            </x-admin.container-input>
    
            <x-admin.btn-edit 
                href="{{ route('pegawai.list') }}" 
                type="submit" 
                name="simpan"
                hapus="{{ route('pegawai.delete', ['id'=>$pegawai]) }}">
            </x-admin.btn-edit>
        </x-admin.form-default>
    </x-admin.card-input>
</x-admin-layout>