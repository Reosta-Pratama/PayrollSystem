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

    
            <x-admin.btn-edit 
                href="{{ route('pegawai.list') }}" 
                type="submit" 
                name="simpan"
                hapus="{{ route('pegawai.delete', ['id'=>$pegawai]) }}">
            </x-admin.btn-edit>
        </x-admin.form-default>
    </x-admin.card-input>
</x-admin-layout>