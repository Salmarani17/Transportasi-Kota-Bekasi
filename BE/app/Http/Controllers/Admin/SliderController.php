<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Tampilkan semua slider
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Form tambah slider
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Simpan slider baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $path = $request->file('image')->store('sliders', 'public');

        Slider::create([
            'image' => $path,
            'is_active' => 1
        ]);

        return redirect()->route('slider.index')
            ->with('success', 'Slider berhasil ditambahkan');
    }

    /**
     * Form edit slider
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update slider
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        if ($request->hasFile('image')) {

            // Hapus gambar lama
            if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }

            // Upload gambar baru
            $path = $request->file('image')->store('sliders', 'public');
            $slider->image = $path;
        }

        $slider->save();

        return redirect()->route('slider.index')
            ->with('success', 'Slider berhasil diupdate');
    }

    /**
     * Hapus slider
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        // Hapus file gambar
        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return back()->with('success', 'Slider berhasil dihapus');
    }
}