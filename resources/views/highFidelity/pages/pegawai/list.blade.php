<x-admin-layout>
    {{-- Isi CSS --}}
    @push('stylesheet')
        {{-- Seo --}}
        <meta name="description" content="deskripsi beranda)">
        <meta name="keywords" content="beranda biolobi">
        <title>Kelola Pegawai - {{ env("APP_NAME") }}</title>

        {{-- Plugin --}}

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    @endpush

    {{-- Isi halaman disini --}}
    <x-admin.title name="kelola Pegawai"></x-admin.title>

    <x-admin.add-button 
        href="{{ route('pegawai.insert') }}"
        name="tambah pegawai">
    </x-admin.add-button>

    <div class="phone:p-2 lg-phone:p-6 rounded-[10px]
        border border-solid border-greenBi/20">
        <table id="myTable" class="display nowrap">
            <thead>
                <tr>
                    <th data-priority="1">Nama</th>
                    <th>Role</th>
                    <th>Jabatan</th>
                    <th>Tanggal masuk</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawai as $pegawai)
                <tr>
                    <td class="length">{{ $pegawai->nama }}</td>
                    <td>{{ $pegawai->user->role }}</td>
                    <td>{{ $pegawai->jabatan }}</td>
                    <td data-order="{{ \Carbon\Carbon::parse($pegawai->tanggalMasuk)->format('U') }}">
                        {{ \Carbon\Carbon::parse($pegawai->tanggalMasuk)->format('d M Y - h:i A') }}
                    </td>
                    <td>{{ $pegawai->status }}</td>
      
                    <x-admin.update-delete 
                        edit="{{ route('pegawai.read', ['id'=>$pegawai->id]) }}"
                        delete="{{ route('pegawai.delete', ['id'=>$pegawai->id]) }}">
                    </x-admin.update-delete>
                </tr>
                @endforeach
            </tbody>
        </table>
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
                    [3, 'desc']
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