<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriBouquet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriBouquetController extends Controller
{
    public function index()
    {
        $kategoriBouquets = KategoriBouquet::latest()->get();

        return view('admin.kategori_bouquet.index', compact('kategoriBouquets'));
    }
    public function create()
    {
        return view('admin.kategori_bouquet.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'harga'  => 'required|numeric|min:0',
            'stok'   => 'required|integer|min:0',
        ]);

        $data = [
            'nama'  => $request->nama,
            'harga' => $request->harga,
            'stok'  => $request->stok,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('kategori-bouquet', 'public');
        }

        KategoriBouquet::create($data);

        return redirect()
            ->route('admin.kategori-bouquet.index')
            ->with('success', 'Kategori bouquet berhasil ditambahkan.');
    }


    // =========================
    // FORM EDIT
    // =========================
    public function edit($id)
    {
        $kategoriBouquet = KategoriBouquet::findOrFail($id);

        return view(
            'admin.kategori_bouquet.edit',
            compact('kategoriBouquet')
        );
    }


    // =========================
    // UPDATE DATA
    // =========================
    public function update(Request $request, $id)
    {
        $kategoriBouquet = KategoriBouquet::findOrFail($id);

        $request->validate([
            'nama'   => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'harga'  => 'required|numeric|min:0',
            'stok'   => 'required|integer|min:0',
        ]);

        $kategoriBouquet->nama = $request->nama;
        $kategoriBouquet->harga = $request->harga;
        $kategoriBouquet->stok = $request->stok;

        // Jika memilih gambar baru
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if (
                $kategoriBouquet->gambar &&
                Storage::disk('public')->exists($kategoriBouquet->gambar)
            ) {
                Storage::disk('public')->delete($kategoriBouquet->gambar);
            }

            // Simpan gambar baru
            $kategoriBouquet->gambar = $request->file('gambar')
                ->store('kategori-bouquet', 'public');
        }

        $kategoriBouquet->save();

        return redirect()
            ->route('admin.kategori-bouquet.index')
            ->with('success', 'Kategori bouquet berhasil diperbarui.');
    }


    // =========================
    // HAPUS DATA
    // =========================
    public function destroy($id)
    {
        $kategoriBouquet = KategoriBouquet::findOrFail($id);

        // Hapus file gambar
        if (
            $kategoriBouquet->gambar &&
            Storage::disk('public')->exists($kategoriBouquet->gambar)
        ) {
            Storage::disk('public')->delete($kategoriBouquet->gambar);
        }

        $kategoriBouquet->delete();

        return redirect()
            ->route('admin.kategori-bouquet.index')
            ->with('success', 'Kategori bouquet berhasil dihapus.');
    }
}