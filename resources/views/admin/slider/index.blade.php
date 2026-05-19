<x-admin-layout>

<div class="flex justify-between mb-6">

    <h2 class="text-2xl font-bold">
        Data Slider
    </h2>

    <a href="{{ route('slider.create') }}"
        class="bg-indigo-600 text-white px-4 py-2 rounded">
        Tambah Slider
    </a>

</div>

<table class="w-full border">

    <thead>
        <tr class="bg-gray-100">
            <th class="p-3 text-left">Gambar</th>
            <th class="p-3 text-right">Aksi</th>
        </tr>
    </thead>

    <tbody>

        @forelse($sliders as $slider)
        <tr class="border-t">

            <!-- Gambar -->
            <td class="p-3">
                @if($slider->image)
                    <img src="{{ asset('storage/' . $slider->image) }}" width="120">
                @endif
            </td>

            <!-- Aksi -->
            <td class="p-3 text-right">

                <a href="{{ route('slider.edit', $slider->id) }}"
                    class="text-indigo-600 mr-3">
                    Edit
                </a>

                <form action="{{ route('slider.destroy', $slider->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        onclick="return confirm('Yakin mau hapus slider ini?')"
                        class="text-red-600">
                        Hapus
                    </button>

                </form>

            </td>

        </tr>

        @empty
        <tr>
            <td colspan="2" class="p-3 text-center text-gray-500">
                Belum ada data slider
            </td>
        </tr>
        @endforelse

    </tbody>

</table>

</x-admin-layout>