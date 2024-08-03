<td>
    <div class="flex items-center gap-2
        phone:justify-end">
        <a
            href="{{ $edit }}"
            class="bg-blueBi px-4 py-2 rounded-[10px] ease-in-out duration-300 hover:bg-[#4665D6]">
            <span class="text-sm text-white capitalize">Edit</span>
        </a>

        <a
            href="{{ $delete }}"
            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"
            class="bg-redBi px-4 py-2 rounded-[10px] ease-in-out duration-300 hover:bg-[#E74C5C]">
            <span class="text-sm text-white capitalize">Hapus</span>
        </a>
    </div>
</td>