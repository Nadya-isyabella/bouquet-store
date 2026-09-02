<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    /**
     * Menampilkan data customer milik user yang sedang login.
     */
    public function index()
    {
        $customer = Customer::where('email', Auth::user()->email)->first();

        return view('user.data.index', compact('customer'));
    }

    /**
     * Form tambah data.
     */
    public function create()
    {
        $user = Auth::user();

        return view('user.data.create', compact('user'));
    }

    /**
     * Menyimpan data customer.
     */
    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $user = Auth::user();

        Customer::create([
            'nama' => $user->name,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);

        return redirect()
            ->route('user.data.index')
            ->with('success', 'Data diri berhasil disimpan.');
    }

    /**
     * Form edit data.
     */
    public function edit(string $id)
    {
        $customer = Customer::where('id', $id)
            ->where('email', Auth::user()->email)
            ->firstOrFail();

        return view('user.data.edit', compact('customer'));
    }

    /**
     * Memperbarui data customer.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'alamat' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $customer = Customer::where('id', $id)
            ->where('email', Auth::user()->email)
            ->firstOrFail();

        $customer->update([
            'nama' => Auth::user()->name,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);

        return redirect()
            ->route('user.data.index')
            ->with('success', 'Data diri berhasil diperbarui.');
    }

    /**
     * Tidak digunakan untuk sementara.
     */
    public function show(string $id)
    {
        return redirect()->route('user.data.index');
    }

    /**
     * Menghapus data customer.
     */
    public function destroy(string $id)
    {
        $customer = Customer::where('id', $id)
            ->where('email', Auth::user()->email)
            ->firstOrFail();

        $customer->delete();

        return redirect()
            ->route('user.data.index')
            ->with('success', 'Data diri berhasil dihapus.');
    }
}