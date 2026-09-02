<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * =========================================================
     * DAFTAR PETUGAS
     * =========================================================
     */
    public function index()
    {
        $petugas = Petugas::latest()->get();

        return view(
            'admin.petugas.index',
            compact('petugas')
        );
    }


    /**
     * =========================================================
     * FORM TAMBAH PETUGAS
     * =========================================================
     */
    public function create()
    {
        return view('admin.petugas.create');
    }


    /**
     * =========================================================
     * SIMPAN PETUGAS
     * =========================================================
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',

            'alamat' => 'required|string',

            'nomor_hp' => 'required|string|max:20',

            'email' => 'required|email|unique:petugas,email',

            'status' => 'required|in:Aktif,Cuti,Sakit,Nonaktif',
        ]);


        Petugas::create([
            'nama' => $request->nama,

            'alamat' => $request->alamat,

            'nomor_hp' => $request->nomor_hp,

            'email' => $request->email,

            'status' => $request->status,
        ]);


        return redirect()
            ->route('admin.petugas.index')
            ->with(
                'success',
                'Petugas berhasil ditambahkan!'
            );
    }


    /**
     * =========================================================
     * FORM EDIT PETUGAS
     * =========================================================
     */
    public function edit(Petugas $petugas)
    {
        return view(
            'admin.petugas.edit',
            compact('petugas')
        );
    }


    /**
     * =========================================================
     * UPDATE PETUGAS
     * =========================================================
     */
    public function update(
        Request $request,
        Petugas $petugas
    ) {

        $request->validate([
            'nama' =>
                'required|string|max:255',

            'alamat' =>
                'required|string',

            'nomor_hp' =>
                'required|string|max:20',

            'email' =>
                'required|email|unique:petugas,email,' . $petugas->id,

            'status' =>
                'required|in:Aktif,Cuti,Sakit,Nonaktif',
        ]);


        $petugas->update([
            'nama' =>
                $request->nama,

            'alamat' =>
                $request->alamat,

            'nomor_hp' =>
                $request->nomor_hp,

            'email' =>
                $request->email,

            'status' =>
                $request->status,
        ]);


        return redirect()
            ->route('admin.petugas.index')
            ->with(
                'success',
                'Petugas berhasil diperbarui!'
            );
    }


    /**
     * =========================================================
     * HAPUS PETUGAS
     * =========================================================
     */
    public function destroy($id)
    {
        // Cari data berdasarkan ID
        $petugas = Petugas::findOrFail($id);

        // Hapus data
        $petugas->delete();

        // Kembali ke daftar petugas
        return redirect()
            ->route('admin.petugas.index')
            ->with(
                'success',
                'Petugas berhasil dihapus!'
            );
    }
}