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
        $transportasi = Transportasi::with(['stasiun', 'rute'])->get();
        return view('admin.transportasi.index', compact('transportasi'));
    }

    public function create()
    {
        return view('admin.transportasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('transportasi', 'public');
        }

        Transportasi::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'gambar' => $gambar,
        ]);

        return redirect()->route('transportasi.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $transportasi = Transportasi::findOrFail($id);
        return view('admin.transportasi.edit', compact('transportasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $t = Transportasi::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $t->gambar = $request->file('gambar')->store('transportasi', 'public');
        }

        $t->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'gambar' => $t->gambar,
        ]);

        return redirect()->route('transportasi.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $transportasi = Transportasi::findOrFail($id);
        $transportasi->delete();

        return redirect()->route('transportasi.index')
            ->with('success', 'Data berhasil dihapus');
    }

    // ================= STASIUN =================
    public function formStasiun($id)
    {
        $transportasi = Transportasi::with('stasiun')->findOrFail($id);
        return view('admin.transportasi.stasiun', compact('transportasi'));
    }

    public function storeStasiun(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'nullable',
            'urutan' => 'required|integer',
        ]);

        $transportasi = Transportasi::findOrFail($id);

        $transportasi->stasiun()->create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'urutan' => $request->urutan,
        ]);

        return back()->with('success', 'Stasiun berhasil ditambahkan');
    }

    // ================= RUTE =================
    public function storeRute(Request $request, $id)
    {
        $request->validate([
            'asal' => 'required',
            'tujuan' => 'required',
        ]);

        $transportasi = Transportasi::findOrFail($id);

        $transportasi->rute()->create([
            'asal' => $request->asal,
            'tujuan' => $request->tujuan,
        ]);

        return back()->with('success', 'Rute berhasil ditambahkan');
    }

    // ================= USER =================
    public function rute()
    {
        $transportasi = Transportasi::with(['stasiun', 'rute'])->get();
        $koasi = Koasi::all();

        return view('rute', compact('transportasi', 'koasi'));
    }

    public function formRute($id)
{
    $transportasi = Transportasi::findOrFail($id);
    return view('admin.transportasi.rute', compact('transportasi'));
}
}