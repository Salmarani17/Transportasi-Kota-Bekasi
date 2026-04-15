<x-admin-layout>

    <h2 class="text-xl font-bold mb-4">Tambah Transportasi</h2>

    <form action="{{ route('transportasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="nama" placeholder="Nama"
            class="w-full border p-2 mb-3 rounded">

        <textarea name="deskripsi" placeholder="Deskripsi"
            class="w-full border p-2 mb-3 rounded"></textarea>

        <input type="file" name="gambar"
            class="w-full border p-2 mb-3 rounded">

        <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>

    </form>

</x-admin-layout>