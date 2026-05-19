<x-admin-layout>

    <h2 class="text-xl font-bold mb-4">Edit Transportasi</h2>

    <form action="{{ route('transportasi.update', $transportasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <input type="text" name="nama"
            value="{{ old('nama', $transportasi->nama) }}"
            class="w-full border p-2 mb-3 rounded"
            placeholder="Nama Transportasi">

        <!-- Jenis -->
        <select name="jenis" class="w-full border p-2 mb-3 rounded">
            <option value="">Pilih Jenis</option>
            <option value="krl" {{ $transportasi->jenis == 'krl' ? 'selected' : '' }}>KRL</option>
            <option value="lrt" {{ $transportasi->jenis == 'lrt' ? 'selected' : '' }}>LRT</option>
            <option value="bus" {{ $transportasi->jenis == 'bus' ? 'selected' : '' }}>Trans Bekasi</option>
        </select>

        <!-- Jam Operasional -->
        <div class="flex gap-3 mb-3">
            <input type="time" name="jam_mulai"
                value="{{ old('jam_mulai', $transportasi->jam_mulai) }}"
                class="w-full border p-2 rounded">

            <input type="time" name="jam_selesai"
                value="{{ old('jam_selesai', $transportasi->jam_selesai) }}"
                class="w-full border p-2 rounded">
        </div>

        <!-- Gambar Lama -->
        @if($transportasi->gambar)
            <img src="{{ asset('storage/' . $transportasi->gambar) }}" width="120" class="mb-3">
        @endif

        <!-- Upload Gambar Baru -->
        <input type="file" name="gambar"
            class="w-full border p-2 mb-3 rounded">

        <button type="submit"
            class="bg-green-600 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</x-admin-layout>