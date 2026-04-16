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
            <th class="p-3 text-left">Jenis</th>
            <th class="p-3 text-left">Jam Operasional</th>
            <th class="p-3 text-left">Stasiun</th>
            <th class="p-3 text-left">Gambar</th>
            <th class="p-3 text-right">Aksi</th>
        </tr>
    </thead>

    <tbody>

        @forelse($transportasi as $t)
        <tr class="border-t">

            <!-- Nama -->
            <td class="p-3">
                {{ $t->nama }}
            </td>

            <!-- Jenis -->
            <td class="p-3">
                {{ strtoupper($t->jenis) }}
            </td>

            <!-- Jam -->
            <td class="p-3">
                {{ $t->jam_mulai }} - {{ $t->jam_selesai }}
            </td>

            <!-- Stasiun -->
            <td class="p-3">

                <!-- tombol tambah -->
                <a href="{{ url('/transportasi/'.$t->id.'/stasiun') }}"
                   class="text-green-600 text-sm">
                   + Tambah Stasiun
                </a>

                <ul class="list-disc ml-4 mt-2">
                    @forelse($t->stasiun as $s)
                        <li>
                            {{ $s->urutan }}. {{ $s->nama }}
                        </li>
                    @empty
                        <li class="text-gray-400">Belum ada stasiun</li>
                    @endforelse
                </ul>

            </td>

            <!-- Gambar -->
            <td class="p-3">
                @if($t->gambar)
                    <img src="{{ asset('storage/' . $t->gambar) }}" width="80">
                @endif
            </td>

            <!-- Aksi -->
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
            <td colspan="6" class="text-center p-5">
                Tidak ada data transportasi
            </td>
        </tr>
        @endforelse

    </tbody>

</table>

</x-admin-layout>