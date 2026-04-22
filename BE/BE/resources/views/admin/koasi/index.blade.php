<x-admin-layout>

<div class="flex justify-between mb-6">

    <h2 class="text-2xl font-bold">Data Koasi</h2>

    <a href="{{ route('koasi.create') }}"
        class="bg-indigo-600 text-white px-4 py-2 rounded">
        Tambah Data
    </a>

</div>

<table class="w-full border">

    <thead>
        <tr class="bg-gray-100">
            <th class="p-3 text-left">Kode</th>
            <th class="p-3 text-left">Rute</th>
            <th class="p-3 text-right">Aksi</th>
        </tr>
    </thead>

    <tbody>

        @forelse($koasi as $k)
        <tr class="border-t">

            <td class="p-3">{{ $k->kode }}</td>
            <td class="p-3">{{ $k->rute }}</td>

            <td class="p-3 text-right">

                <a href="{{ route('koasi.edit', $k->id) }}"
                    class="text-indigo-600 mr-3">
                    Edit
                </a>

                <form action="{{ route('koasi.destroy', $k->id) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        onclick="return confirm('Yakin hapus?')"
                        class="text-red-600">
                        Hapus
                    </button>

                </form>

            </td>

        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center p-5">
                Tidak ada data
            </td>
        </tr>
        @endforelse

    </tbody>

</table>

</x-admin-layout>