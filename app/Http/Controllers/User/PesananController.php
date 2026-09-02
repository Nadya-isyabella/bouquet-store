<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Pemesanan;
use App\Models\PemesananDetail; // Sesuaikan dengan nama model detail kamu (PemesananDetail / DetailPemesanan)
use App\Models\KategoriBouquet;
use App\Models\Aksesoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    /**
     * Tampilkan Daftar Pesanan User
     */
    public function index()
    {
        $user = auth()->user();
        $customer = Customer::where('email', $user->email)->first();

        $pemesanans = $customer 
            ? Pemesanan::where('customer_id', $customer->id)->with(['customer', 'details', 'pembayaran'])->latest()->get() 
            : collect();

        $bouquets = KategoriBouquet::latest()->get();
        $aksesoris = Aksesoris::latest()->get();

        return view('user.pesanan.index', compact('pemesanans', 'bouquets', 'aksesoris'));
    }

    /**
     * Tampilkan Form Pemesanan
     */
    public function create()
    {
        $bouquets = KategoriBouquet::where('stok', '>', 0)->latest()->get();
        $aksesoris = Aksesoris::where('stok', '>', 0)->latest()->get();

        return view('user.pesanan.pemesanan', compact('bouquets', 'aksesoris'));
    }

    /**
     * Simpan Pemesanan & Redirect ke Status Bouquet User
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_hp'             => 'required|string|max:20',
            'alamat'               => 'required|string',
            'tanggal_pemesanan'    => 'required|date',
            'tanggal_pengembalian'  =>'required|date|after_or_equal:tanggal_pemesanan', // Diperbaiki: Typo nu;;llable diselesaikan
            'total_harga'          => 'required|numeric|min:1',
            'items'                => 'required|array|min:1',
        ]);

        DB::beginTransaction();

        try {
            $user = auth()->user();

            // 1. Simpan / Cari Data Customer
            $customer = Customer::firstOrCreate(
                ['email' => $user->email],
                ['nama' => $user->name, 'nomor_hp' => $request->nomor_hp, 'alamat' => $request->alamat]
            );

            $customer->update([
                'nomor_hp' => $request->nomor_hp,
                'alamat'   => $request->alamat,
            ]);

            // 2. Buat Record Pemesanan
            $pemesanan = Pemesanan::create([
                'customer_id'          => $customer->id,
                'alamat'               => $request->alamat, // Diperbaiki: Ditambahkan agar tidak error Field 'alamat' doesn't have a default value
                'tanggal_pemesanan'    => $request->tanggal_pemesanan,
                'tanggal_pengembalian' => $request->tanggal_pengembalian, // Diperbaiki: Disesuaikan dengan kolom database 'tanggal_pengembalian'
                'total_harga'          => $request->total_harga,
                'status'               => 'pending',
            ]);

            // 3. Simpan Detail Items
            foreach ($request->items as $item) {
                // Gunakan nama model detail kamu yang aktif (misal: PemesananDetail atau DetailPemesanan)
                PemesananDetail::create([
                    'pemesanan_id' => $pemesanan->id,
                    'item_id'      => $item['item_id'],
                    'item_type'    => $item['item_type'],
                    'jumlah'       => $item['jumlah'],
                    'harga_satuan' => $item['harga_satuan'],
                    'subtotal'     => $item['jumlah'] * $item['harga_satuan'],
                ]);

                // Kurangi Stok
                if ($item['item_type'] === 'bouquet') {
                    KategoriBouquet::where('id', $item['item_id'])->decrement('stok', $item['jumlah']);
                } else {
                    Aksesoris::where('id', $item['item_id'])->decrement('stok', $item['jumlah']);
                }
            }

            DB::commit();

            // REDIRECT KE ROUTE STATUS BOUQUET USER
            return redirect()->route('user.bouquet.index')
                             ->with('success', 'Pesanan berhasil dibuat!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => 'Gagal membuat pesanan: ' . $e->getMessage()]);
        }
    }
}