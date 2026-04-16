<x-admin-layout>

    <h2 class="text-xl font-bold mb-4">Tambah Transportasi</h2>

    <form action="{{ route('transportasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nama -->
        <input type="text" name="nama" placeholder="Nama Transportasi"
            class="w-full border p-2 mb-3 rounded">

        <!-- Jenis -->
        <select name="jenis" class="w-full border p-2 mb-3 rounded">
            <option value="">Pilih Jenis</option>
            <option value="krl">KRL</option>
            <option value="lrt">LRT</option>
            <option value="bus">Trans Bekasi</option>
        </select>

        <!-- Jam Operasional -->
        <div class="flex gap-3 mb-3">
            <input type="time" name="jam_mulai"
                class="w-full border p-2 rounded">

            <input type="time" name="jam_selesai"
                class="w-full border p-2 rounded">
        </div>

        <!-- Upload Gambar -->
        <input type="file" name="gambar"
            class="w-full border p-2 mb-3 rounded">

        <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>

    </form>

</x-admin-layout>