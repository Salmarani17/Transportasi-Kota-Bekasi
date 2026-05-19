<x-admin-layout>

<div class="max-w-3xl">

    <h2 class="text-2xl font-bold mb-6">
        Edit Slider
    </h2>

    <form action="{{ route('slider.update', $slider->id) }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="border rounded p-6 bg-white">

        @csrf
        @method('PUT')

        <!-- Gambar sekarang -->
        <div class="mb-4">
            <label class="block mb-2 font-medium">Gambar Saat Ini</label>
            <img src="{{ asset('storage/'.$slider->image) }}" width="150">
        </div>

        <!-- Upload gambar -->
        <div class="mb-4">
            <label class="block mb-2 font-medium">Gambar Baru</label>
            <input type="file" 
                   name="image"
                   class="w-full border rounded px-3 py-2">
        </div>

        <!-- Status -->
        <div class="mb-6">
            <label class="inline-flex items-center">
                <input type="checkbox" 
                       name="is_active" 
                       value="1"
                       class="mr-2"
                       {{ $slider->is_active ? 'checked' : '' }}>
                Aktif
            </label>
        </div>

        <!-- Button -->
        <button type="submit" 
                class="bg-green-600 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</div>

</x-admin-layout>