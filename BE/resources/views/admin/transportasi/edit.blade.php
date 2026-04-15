<x-admin-layout>

    <h2 class="text-xl font-bold mb-4">Edit Transportasi</h2>

    <form action="{{ route('transportasi.update', $transportasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="nama" value="{{ old('nama', $transportasi->nama) }}"
            class="w-full border p-2 mb-3 rounded">

        <textarea name="deskripsi"
            class="w-full border p-2 mb-3 rounded">{{ old('deskripsi', $transportasi->deskripsi) }}</textarea>

        @if($transportasi->gambar)
            <img src="{{ asset('storage/' . $transportasi->gambar) }}" width="120" class="mb-3">
        @endif

        <input type="file" name="gambar"
            class="w-full border p-2 mb-3 rounded">

        <button type="submit"
            class="bg-green-600 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</x-admin-layout>