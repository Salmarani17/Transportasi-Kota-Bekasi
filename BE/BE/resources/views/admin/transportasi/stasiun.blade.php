<x-admin-layout>

<div class="flex justify-between mb-6">

    <h2 class="text-2xl font-bold">
        Stasiun - {{ $transportasi->nama }}
    </h2>

    <a href="{{ route('transportasi.index') }}"
        class="bg-gray-500 text-white px-4 py-2 rounded">
        Kembali
    </a>

</div>

<!-- FORM TAMBAH STASIUN -->
<div class="mb-6 p-4 border rounded">

    <h3 class="font-semibold mb-3">Tambah Stasiun</h3>

    <form action="{{ route('transportasi.stasiun.store', $transportasi->id) }}" method="POST">
        @csrf

        <div class="grid grid-cols-3 gap-3">

            <input type="text" name="nama" placeholder="Nama Stasiun"
                class="border p-2 rounded">

            <input type="text" name="alamat" placeholder="Alamat"
                class="border p-2 rounded">

            <input type="number" name="urutan" placeholder="Urutan"
                class="border p-2 rounded">

        </div>

        <button type="submit"
            class="mt-3 bg-green-600 text-white px-4 py-2 rounded">
            Tambah
        </button>

    </form>

</div>

<!-- TABLE STASIUN -->
<table class="w-full border">

    <thead>
        <tr class="bg-gray-100">
            <th class="p-3 text-left">Urutan</th>
            <th class="p-3 text-left">Nama</th>
            <th class="p-3 text-left">Alamat</th>
        </tr>
    </thead>

    <tbody>

        @forelse($transportasi->stasiun as $s)
        <tr class="border-t">

            <td class="p-3">
                {{ $s->urutan }}
            </td>

            <td class="p-3">
                {{ $s->nama }}
            </td>

            <td class="p-3">
                {{ $s->alamat }}
            </td>

        </tr>

        @empty
        <tr>
            <td colspan="3" class="text-center p-5 text-gray-400">
                Belum ada stasiun
            </td>
        </tr>
        @endforelse

    </tbody>

</table>

</x-admin-layout>