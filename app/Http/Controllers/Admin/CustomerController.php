<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * =========================================================
     * DATA CUSTOMER
     * =========================================================
     */
    public function index()
    {
        $customers = Customer::latest()->get();

        return view(
            'admin.customer.index',
            compact('customers')
        );
    }


    /**
     * =========================================================
     * FORM TAMBAH CUSTOMER
     * =========================================================
     */
    public function create()
    {
        return view('admin.customer.create');
    }


    /**
     * =========================================================
     * SIMPAN CUSTOMER
     * =========================================================
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',

            'nomor_hp' => 'required|string|max:20',

            'email' => 'required|email|max:255|unique:customers,email',

            'alamat' => 'required|string',
        ]);


        Customer::create([
            'nama' => $request->nama,

            'nomor_hp' => $request->nomor_hp,

            'email' => $request->email,

            'alamat' => $request->alamat,
        ]);


        return redirect()
            ->route('admin.customer.index')
            ->with(
                'success',
                'Data customer berhasil ditambahkan!'
            );
    }


    /**
     * =========================================================
     * FORM EDIT CUSTOMER
     * =========================================================
     */
    public function edit(Customer $customer)
    {
        return view(
            'admin.customer.edit',
            compact('customer')
        );
    }


    /**
     * =========================================================
     * UPDATE CUSTOMER
     * =========================================================
     */
    public function update(
        Request $request,
        Customer $customer
    ) {

        $request->validate([
            'nama' =>
                'required|string|max:255',

            'nomor_hp' =>
                'required|string|max:20',

            'email' =>
                'required|email|max:255|unique:customers,email,' . $customer->id,

            'alamat' =>
                'required|string',
        ]);


        $customer->update([
            'nama' =>
                $request->nama,

            'nomor_hp' =>
                $request->nomor_hp,

            'email' =>
                $request->email,

            'alamat' =>
                $request->alamat,
        ]);


        return redirect()
            ->route('admin.customer.index')
            ->with(
                'success',
                'Data customer berhasil diperbarui!'
            );
    }


    /**
     * =========================================================
     * HAPUS CUSTOMER
     * =========================================================
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()
            ->route('admin.customer.index')
            ->with(
                'success',
                'Data customer berhasil dihapus!'
            );
    }
}