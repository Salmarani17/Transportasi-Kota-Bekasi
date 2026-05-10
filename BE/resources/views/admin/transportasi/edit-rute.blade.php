<x-admin-layout>

<h2 class="text-2xl font-bold mb-6">
    Edit Rute
</h2>

<form action="{{ route('rute.update', $rute->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-4">

        <label>Asal</label>

        <input type="text"
               name="asal"
               value="{{ $rute->asal }}"
               class="border p-2 rounded w-full">

    </div>

    <div class="mb-4">

        <label>Tujuan</label>

        <input type="text"
               name="tujuan"
               value="{{ $rute->tujuan }}"
               class="border p-2 rounded w-full">

    </div>

    <button type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded">

        Update

    </button>

</form>

</x-admin-layout>