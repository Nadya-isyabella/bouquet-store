<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aksesoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AksesorisController extends Controller
{
    public function index()
    {
        $aksesoris = Aksesoris::latest()->get();

        return view('admin.aksesoris.index', compact('aksesoris'));
    }

    public function create()
    {
        return view('admin.aksesoris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'harga'  => 'required|numeric|min:0',
            'stok'   => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'nama'  => $request->nama,
            'harga' => $request->harga,
            'stok'  => $request->stok,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('aksesoris', 'public');
        }

        Aksesoris::create($data);

        return redirect()
            ->route('admin.aksesoris.index')
            ->with('success', 'Aksesoris berhasil ditambahkan.');
    }

    // =========================
    // EDIT
    // =========================
    public function edit($id)
    {
        $aksesoris = Aksesoris::findOrFail($id);

        return view('admin.aksesoris.edit', compact('aksesoris'));
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
    {
        $aksesoris = Aksesoris::findOrFail($id);

        $request->validate([
            'nama'   => 'required|string|max:255',
            'harga'  => 'required|numeric|min:0',
            'stok'   => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $aksesoris->nama = $request->nama;
        $aksesoris->harga = $request->harga;
        $aksesoris->stok = $request->stok;

        // Kalau user memilih gambar baru
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($aksesoris->gambar &&
                Storage::disk('public')->exists($aksesoris->gambar)) {

                Storage::disk('public')->delete($aksesoris->gambar);
            }

            // Simpan gambar baru
            $aksesoris->gambar = $request->file('gambar')
                ->store('aksesoris', 'public');
        }

        $aksesoris->save();

        return redirect()
            ->route('admin.aksesoris.index')
            ->with('success', 'Aksesoris berhasil diperbarui.');
    }

    // =========================
    // DELETE
    // =========================
    public function destroy($id)
    {
        $aksesoris = Aksesoris::findOrFail($id);

        if ($aksesoris->gambar &&
            Storage::disk('public')->exists($aksesoris->gambar)) {

            Storage::disk('public')->delete($aksesoris->gambar);
        }

        $aksesoris->delete();

        return redirect()
            ->route('admin.aksesoris.index')
            ->with('success', 'Aksesoris berhasil dihapus.');
    }
}