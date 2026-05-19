<x-admin-layout>

<div class="flex justify-between mb-6">

    <h2 class="text-2xl font-bold">
        Rute - {{ $transportasi->nama }}
    </h2>

    <a href="{{ route('transportasi.index') }}"
        class="bg-gray-500 text-white px-4 py-2 rounded">
        Kembali
    </a>

</div>

<!-- FORM TAMBAH RUTE -->
<div class="mb-6 p-4 border rounded">

    <h3 class="font-semibold mb-3">Tambah Rute</h3>

    <form action="{{ url('/transportasi/'.$transportasi->id.'/rute') }}" method="POST">
        @csrf

        <div class="grid grid-cols-2 gap-3">

            <input type="text" name="asal"
                placeholder="Asal"
                class="border p-2 rounded">

            <input type="text" name="tujuan"
                placeholder="Tujuan"
                class="border p-2 rounded">

        </div>

        <button type="submit"
            class="mt-3 bg-green-600 text-white px-4 py-2 rounded">
            Tambah
        </button>

    </form>

</div>

<!-- TABLE RUTE -->
<table class="w-full border">

    <thead>
        <tr class="bg-gray-100">
            <th class="p-3 text-left">Asal</th>
            <th class="p-3 text-left">Tujuan</th>
            <th class="p-3 text-left">Aksi</th>
        </tr>
    </thead>

    <tbody>

        @forelse($transportasi->rute as $r)
        <tr class="border-t">

            <td class="p-3">
                {{ $r->asal }}
            </td>

            <td class="p-3">
                {{ $r->tujuan }}
            </td>

            <td class="p-3 flex gap-2">

                <!-- EDIT -->
                <a href="{{ route('rute.edit', $r->id) }}"
                    class="bg-yellow-500 text-white px-3 py-1 rounded">
                    Edit
                </a>

                <!-- HAPUS -->
                <form action="{{ route('rute.destroy', $r->id) }}"
                    method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        onclick="return confirm('Yakin hapus rute?')"
                        class="bg-red-600 text-white px-3 py-1 rounded">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        @empty
        <tr>
            <td colspan="3" class="text-center p-5 text-gray-400">
                Belum ada rute
            </td>
        </tr>
        @endforelse

    </tbody>

</table>

</x-admin-layout>