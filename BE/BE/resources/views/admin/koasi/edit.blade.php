<x-admin-layout>

<h2 class="text-xl font-bold mb-4">Edit Koasi</h2>

<form action="{{ route('koasi.update', $koasi->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="kode"
        value="{{ $koasi->kode }}"
        class="w-full border p-2 mb-3 rounded">

    <input type="text" name="rute"
        value="{{ $koasi->rute }}"
        class="w-full border p-2 mb-3 rounded">

    <button type="submit"
        class="bg-green-600 text-white px-4 py-2 rounded">
        Update
    </button>

</form>

</x-admin-layout>