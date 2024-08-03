<x-admin-layout>
    {{-- Isi CSS --}}
    @push('stylesheet')
        {{-- Seo --}}
        <meta name="description" content="deskripsi beranda)">
        <meta name="keywords" content="beranda biolobi">
        <title>Tambah Gaji - {{ env("APP_NAME") }}</title>

        {{-- Plugin --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    @endpush

    {{-- Isi halaman disini --}}
    <x-admin.title name="tambah Gaji"></x-admin.title>

    <div class="w-full flex gap-5">
        <x-admin.card-input>
            <x-admin.form-default
                id="formTopic"
                action="{{ route('gaji.insert', ['id'=>$pegawai->id]) }}">
                <x-admin.container-input>
                    <input type="hidden" name="pegawaiID" value="{{ $pegawai->id }}">
    
                    <x-admin.content-input>
                        <x-admin.content-input>
                            <x-admin.label for="gajiPokok" name="gajiPokok"></x-admin.label>
                            <x-admin.input
                                id="gajiPokok"
                                name="gajiPokok"
                                type="number"
                                :value="old('gajiPokok')"
                                :isRequired="true">
                            </x-admin.input>
        
                            @error('gajiPokok')
                                <x-admin.error message="{{ $message }}"></x-admin.error>
                            @enderror
                        </x-admin.content-input>
    
                        <x-admin.content-input>
                            <x-admin.label for="tunjangan" name="tunjangan"></x-admin.label>
                            <x-admin.input
                                id="tunjangan"
                                name="tunjangan"
                                type="number"
                                :value="old('tunjangan')"
                                :isRequired="true">
                            </x-admin.input>
        
                            @error('tunjangan')
                                <x-admin.error message="{{ $message }}"></x-admin.error>
                            @enderror
                        </x-admin.content-input>
    
                        <x-admin.content-input>
                            <x-admin.label for="bonus" name="bonus"></x-admin.label>
                            <x-admin.input
                                id="bonus"
                                name="bonus"
                                type="number"
                                :value="old('bonus')"
                                :isRequired="true">
                            </x-admin.input>
        
                            @error('bonus')
                                <x-admin.error message="{{ $message }}"></x-admin.error>
                            @enderror
                        </x-admin.content-input>
    
                        <x-admin.content-input>
                            <x-admin.label for="potongan" name="potongan"></x-admin.label>
                            <x-admin.input
                                id="potongan"
                                name="potongan"
                                type="number"
                                :value="old('potongan')"
                                :isRequired="true">
                            </x-admin.input>
        
                            @error('potongan')
                                <x-admin.error message="{{ $message }}"></x-admin.error>
                            @enderror
                        </x-admin.content-input>
    
                        <x-admin.content-input>
                            <x-admin.label for="tanggalGaji" name="tanggalGaji"></x-admin.label>
                            <x-admin.input
                                id="tanggalGaji"
                                name="tanggalGaji"
                                type="date"
                                :value="old('tanggalGaji')"
                                :isRequired="true">
                            </x-admin.input>
        
                            @error('tanggalGaji')
                                <x-admin.error message="{{ $message }}"></x-admin.error>
                            @enderror
                        </x-admin.content-input>
    
                        <x-admin.label for="status" name="status"></x-admin.label>
                        <x-admin.select id="status" name="status" :isRequired="true">
                            @foreach (['bayar', 'belomDibayar'] as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </x-admin.select>
    
                        @error('status')
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

        <div class="flex flex-1 flex-col">
            <table id="myTable" class="display nowrap">
                <thead>
                    <tr>
                        <th data-priority="1">Tanggal</th>
                        <th>Gaji</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawai->gaji as $gaji)
                    <tr>
                        <td data-order="{{ \Carbon\Carbon::parse($gaji->tanggalGaji)->format('U') }}">
                            {{ \Carbon\Carbon::parse($gaji->tanggalGaji)->format('d M Y') }}
                        </td>

                        <td>Rp.{{ number_format($gaji->gajiPokok + $gaji->tunjangan + $gaji->bonus - $gaji->potongan, 0, ',', '.') }}</td>
                        <td>{{ $gaji->status }}</td>
          
                        <td>
                            <div class="flex items-center gap-2
                                phone:justify-end">
                                <a
                                    href="{{ route('gaji.delete', ['id'=>$gaji->id]) }}"
                                    class="bg-redBi px-4 py-2 rounded-[10px] ease-in-out duration-300 hover:bg-[#4665D6]">
                                    <span class="text-sm text-white capitalize">hapus</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Isi Javascript --}}
    @push('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script type="module">
        $(document).ready(function () {
            // Limit string
            let stringLength = $(window).width() <= 600 ? 15 : 50;
            $('td.length').each(function() {
                let text = $(this).text();
                if (text.length > stringLength) {
                    $(this).text(text.substring(0, stringLength) + '...');
                }
            });

            let pagingType = "simple_numbers"; 
            if ($(window).width() <= 600) {
                pagingType = "full"; 
            }

            $('#myTable').DataTable({
                responsive: true,
                order: [
                    [0, 'desc']
                ],
                columnDefs: [
                    {
                        targets: -1,
                        orderable: false
                    }
                ],
                language: {
                    lengthMenu: 'Tampilkan _MENU_ data',
                    search: 'Cari data:',
                    info: 'Menampilkan _START_ - _END_ dari _TOTAL_ data',
                    paginate: {
                        previous: '<i class="fa-solid fa-chevron-left"></i>',
                        next: '<i class="fa-solid fa-chevron-right"></i>',
                        render: function (data) {
                            return data;
                        }
                    }
                },
                oLanguage: {
                        oPaginate: {
                            sFirst: "Pertama",
                            sLast: "Terakhir"
                        }
                    },
                pagingType: pagingType
            });
        });
    </script>
    @endpush
</x-admin-layout>