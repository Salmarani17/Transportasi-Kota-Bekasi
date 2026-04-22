<?php

namespace App\Http\Controllers;

use App\Models\Koasi;
use Illuminate\Http\Request;

class KoasiController extends Controller
{
    // ================= ADMIN =================
    public function index()
    {
        $koasi = Koasi::all();
        return view('admin.koasi.index', compact('koasi'));
    }

    public function create()
    {
        return view('admin.koasi.create');
    }

    public function store(Request $request)
    {
        Koasi::create([
            'kode' => $request->kode,
            'rute' => $request->rute,
        ]);

        return redirect()->route('koasi.index');
    }

    public function edit($id)
    {
        $koasi = Koasi::findOrFail($id);
        return view('admin.koasi.edit', compact('koasi'));
    }

    public function update(Request $request, $id)
    {
        $k = Koasi::findOrFail($id);

        $k->kode = $request->kode;
        $k->rute = $request->rute;
        $k->save();

        return redirect()->route('koasi.index');
    }

    public function destroy($id)
    {
        $k = Koasi::findOrFail($id);
        $k->delete();

        return redirect()->route('koasi.index');
    }

    // ================= API =================
    public function apiIndex()
    {
        return response()->json(Koasi::all());
    }

    public function apiStore(Request $request)
    {
        $koasi = Koasi::create([
            'kode' => $request->kode,
            'rute' => $request->rute,
        ]);

        return response()->json($koasi);
    }

    public function apiDestroy($id)
    {
        $koasi = Koasi::findOrFail($id);
        $koasi->delete();

        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}