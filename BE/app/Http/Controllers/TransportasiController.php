<?php

namespace App\Http\Controllers;

use App\Models\Transportasi;
use App\Models\Koasi;
use Illuminate\Http\Request;

class TransportasiController extends Controller
{
    // ================= ADMIN =================
    public function index()
    {
        $transportasi = Transportasi::all();
        return view('admin.transportasi.index', compact('transportasi'));
    }

    public function create()
    {
        return view('admin.transportasi.create');
    }

    public function store(Request $request)
    {
        $gambar = $request->file('gambar')->store('transportasi', 'public');

        Transportasi::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar,
        ]);

        return redirect()->route('transportasi.index');
    }

    public function edit($id)
    {
        $transportasi = Transportasi::findOrFail($id);
        return view('admin.transportasi.edit', compact('transportasi'));
    }

    public function update(Request $request, $id)
    {
        $t = Transportasi::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('transportasi', 'public');
            $t->gambar = $gambar;
        }

        $t->nama = $request->nama;
        $t->deskripsi = $request->deskripsi;
        $t->save();

        return redirect()->route('transportasi.index');
    }

 public function destroy($id)
{
    $transportasi = Transportasi::findOrFail($id);
    $transportasi->delete();

    return redirect()->route('transportasi.index')
        ->with('success', 'Data berhasil dihapus');
}

    // ================= USER (FRONTEND) =================
    public function rute()
    {
        $transportasi = Transportasi::all();
        $koasi = Koasi::all();

        return view('rute', compact('transportasi', 'koasi'));
    }
}