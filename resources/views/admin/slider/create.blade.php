<x-admin-layout>
<h1 style="color:white;">SLIDER TEST</h1>
<h2 class="text-xl font-bold mb-4">Tambah Slider</h2>

<form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Upload Gambar -->
    <input type="file" name="image"
        class="w-full border p-2 mb-3 rounded" required>

    <button type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded">
        Simpan
    </button>

</form>

</x-admin-layout>