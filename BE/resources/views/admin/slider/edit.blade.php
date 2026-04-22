<x-admin-layout>
<h2>Edit Slider</h2>

<form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <img src="{{ asset('storage/'.$slider->image) }}" width="150"><br><br>

    <input type="file" name="image"><br><br>

    <label>
        <input type="checkbox" name="is_active" value="1" {{ $slider->is_active ? 'checked' : '' }}>
        Aktif
    </label>

    <br><br>
    <button type="submit">Update</button>
</form>
</x-admin-layout>