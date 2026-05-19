<x-admin-layout>

<h2 class="text-2xl font-bold mb-6">
    Edit Stasiun
</h2>

<form action="{{ route('stasiun.update', $stasiun->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="space-y-4">

        <input type="text"
               name="nama"
               value="{{ $stasiun->nama }}"
               class="w-full border p-2 rounded">

        <input type="text"
               name="alamat"
               value="{{ $stasiun->alamat }}"
               class="w-full border p-2 rounded">

        <input type="number"
               name="urutan"
               value="{{ $stasiun->urutan }}"
               class="w-full border p-2 rounded">

    </div>

    <button type="submit"
        class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">

        Update

    </button>

</form>

</x-admin-layout>