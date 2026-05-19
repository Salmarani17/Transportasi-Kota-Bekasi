<x-admin-layout>

<h2 class="text-xl font-bold mb-4">Tambah Koasi</h2>

<form action="{{ route('koasi.store') }}" method="POST">
    @csrf

    <input type="text" name="kode" placeholder="Kode"
        class="w-full border p-2 mb-3 rounded">

    <input type="text" name="rute" placeholder="Rute"
        class="w-full border p-2 mb-3 rounded">

    <button type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded">
        Simpan
    </button>

</form>

</x-admin-layout>