<x-admin-layout>

<div class="flex justify-between mb-6">

    <h2 class="text-2xl font-bold">
        Data Transportasi
    </h2>

    <a href="{{ route('transportasi.create') }}"
        class="bg-indigo-600 text-white px-4 py-2 rounded">
        Tambah Data
    </a>

</div>

<table class="w-full border">

    <thead>
        <tr class="bg-gray-100">
            <th class="p-3 text-left">Nama</th>
            <th class="p-3 text-left">Deskripsi</th>
            <th class="p-3 text-left">Gambar</th>
            <th class="p-3 text-right">Aksi</th>
        </tr>
    </thead>

    <tbody>

        @forelse($transportasi as $t)
        <tr class="border-t">

            <td class="p-3">
                {{ $t->nama }}
            </td>

            <td class="p-3">
                {{ $t->deskripsi }}
            </td>

            <td class="p-3">
                <img src="{{ asset('storage/' . $t->gambar) }}" width="80">
            </td>

            <td class="p-3 text-right">

                <a href="{{ route('transportasi.edit', $t->id) }}"
                    class="text-indigo-600 mr-3">
                    Edit
                </a>

                <form action="{{ route('transportasi.destroy', $t->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        onclick="return confirm('Yakin mau hapus data ini?')"
                        class="text-red-600">
                        Hapus
                    </button>

                </form>

            </td>

        </tr>

        @empty
        <tr>
            <td colspan="4" class="text-center p-5">
                Tidak ada data transportasi
            </td>
        </tr>
        @endforelse

    </tbody>

</table>

</x-admin-layout>