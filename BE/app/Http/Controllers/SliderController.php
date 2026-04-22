<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('is_active', true)->get();
        return view('index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $path = $request->file('image')->store('sliders', 'public');

        Slider::create([
            'image' => $path
        ]);

        return back()->with('success', 'Slider berhasil ditambahkan');
    }
}
