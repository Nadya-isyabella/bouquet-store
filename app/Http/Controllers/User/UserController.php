<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use App\Models\KategoriBouquet;
use App\Models\Aksesoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * =========================================================
     * DASHBOARD USER
     * =========================================================
     */
    public function dashboard()
    {
        /*
        |--------------------------------------------------------------------------
        | DATA BOUQUET
        |--------------------------------------------------------------------------
        */

        $bouquets = KategoriBouquet::orderBy(
            'created_at',
            'desc'
        )->get();


        /*
        |--------------------------------------------------------------------------
        | DATA AKSESORIS
        |--------------------------------------------------------------------------
        */

        $aksesoris = Aksesoris::orderBy(
            'created_at',
            'desc'
        )->get();


        /*
        |--------------------------------------------------------------------------
        | PESANAN TERAKHIR USER
        |--------------------------------------------------------------------------
        */

        $user = auth()->user();

        $customer = Customer::where(
            'email',
            $user->email
        )->first();


        $pesananTerakhir = null;

        if ($customer) {

            $pesananTerakhir = Pemesanan::where(
                'customer_id',
                $customer->id
            )
            ->with([
                'details',
                'pembayaran'
            ])
            ->orderBy(
                'created_at',
                'desc'
            )
            ->first();
        }


        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view(
            'user.dashboard',
            compact(
                'bouquets',
                'aksesoris',
                'pesananTerakhir'
            )
        );
    }


    /**
     * =========================================================
     * HALAMAN PEMESANAN
     * =========================================================
     */
    public function dataPemesanan()
    {
        return view('user.pemesanan.index');
    }


    /**
     * =========================================================
     * DAFTAR PESANAN USER
     * =========================================================
     */
    public function pesanan()
    {
        $user = auth()->user();

        $customer = Customer::where(
            'email',
            $user->email
        )->first();


        if (!$customer) {

            $pemesanans = collect();

        } else {

            $pemesanans = Pemesanan::where(
                'customer_id',
                $customer->id
            )
            ->with([
                'details',
                'pembayaran'
            ])
            ->orderBy(
                'created_at',
                'desc'
            )
            ->get();
        }


        return view(
            'user.pesanan.index',
            compact('pemesanans')
        );
    }


    /**
     * =========================================================
     * HALAMAN BUAT PESANAN
     * =========================================================
     */
    public function createPesanan()
    {
        /*
        |--------------------------------------------------------------------------
        | BOUQUET
        |--------------------------------------------------------------------------
        */

        $bouquets = KategoriBouquet::orderBy(
            'created_at',
            'desc'
        )->get();


        /*
        |--------------------------------------------------------------------------
        | AKSESORIS
        |--------------------------------------------------------------------------
        */

        $aksesoris = Aksesoris::orderBy(
            'created_at',
            'desc'
        )->get();


        return view(
            'user.pesanan.create',
            compact(
                'bouquets',
                'aksesoris'
            )
        );
    }


    /**
     * =========================================================
     * SIMPAN PESANAN
     * =========================================================
     */
    public function storePesanan(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'nomor_hp' => [
                'required',
                'string',
                'max:20',
            ],

            'alamat' => [
                'required',
                'string',
            ],

            'tanggal_pemesanan' => [
                'required',
                'date',
            ],

            'tanggal_pengembalian' => [
                'nullable',
                'date',
                'after_or_equal:tanggal_pemesanan',
            ],

            'total_harga' => [
                'required',
                'numeric',
                'min:0',
            ],

            'items' => [
                'required',
                'array',
                'min:1',
            ],

            'items.*.item_id' => [
                'required',
                'integer',
            ],

            'items.*.item_type' => [
                'required',
                'in:bouquet,aksesoris',
            ],

            'items.*.jumlah' => [
                'required',
                'integer',
                'min:1',
            ],
        ]);


        DB::beginTransaction();


        try {

            /*
            |--------------------------------------------------------------------------
            | USER
            |--------------------------------------------------------------------------
            */

            $user = auth()->user();


            /*
            |--------------------------------------------------------------------------
            | CUSTOMER
            |--------------------------------------------------------------------------
            */

            $customer = Customer::where(
                'email',
                $user->email
            )->first();


            /*
            |--------------------------------------------------------------------------
            | BUAT / UPDATE CUSTOMER
            |--------------------------------------------------------------------------
            */

            if (!$customer) {

                $customer = Customer::create([

                    'nama' => $user->name,

                    'nomor_hp' =>
                        $validated['nomor_hp'],

                    'alamat' =>
                        $validated['alamat'],

                    'email' =>
                        $user->email,
                ]);

            } else {

                $customer->update([

                    'nama' => $user->name,

                    'nomor_hp' =>
                        $validated['nomor_hp'],

                    'alamat' =>
                        $validated['alamat'],
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | PEMESANAN
            |--------------------------------------------------------------------------
            */

            $pemesanan = Pemesanan::create([

                'customer_id' =>
                    $customer->id,

                'alamat' =>
                    $validated['alamat'],

                'tanggal_pemesanan' =>
                    $validated['tanggal_pemesanan'],

                'tanggal_pengembalian' =>
                    $validated['tanggal_pengembalian'] ?? null,

                'total_harga' =>
                    $validated['total_harga'],

                'status' =>
                    'baru',
            ]);


            /*
            |--------------------------------------------------------------------------
            | DETAIL PEMESANAN
            |--------------------------------------------------------------------------
            */

            foreach ($validated['items'] as $item) {

                $itemId =
                    $item['item_id'];

                $itemType =
                    $item['item_type'];

                $jumlah =
                    $item['jumlah'];


                /*
                |--------------------------------------------------------------------------
                | CARI PRODUK
                |--------------------------------------------------------------------------
                */

                if ($itemType === 'bouquet') {

                    $produk =
                        KategoriBouquet::findOrFail(
                            $itemId
                        );

                } elseif ($itemType === 'aksesoris') {

                    $produk =
                        Aksesoris::findOrFail(
                            $itemId
                        );

                } else {

                    throw new \Exception(
                        'Jenis produk tidak valid.'
                    );
                }


                /*
                |--------------------------------------------------------------------------
                | CEK STOK
                |--------------------------------------------------------------------------
                */

                if ($produk->stok < $jumlah) {

                    throw new \Exception(
                        'Stok produk "' .
                        $produk->nama .
                        '" tidak mencukupi.'
                    );
                }


                /*
                |--------------------------------------------------------------------------
                | HARGA
                |--------------------------------------------------------------------------
                */

                $harga =
                    $produk->harga;

                $subtotal =
                    $harga * $jumlah;


                /*
                |--------------------------------------------------------------------------
                | DETAIL
                |--------------------------------------------------------------------------
                */

                PemesananDetail::create([

                    'pemesanan_id' =>
                        $pemesanan->id,

                    'item_id' =>
                        $itemId,

                    'item_type' =>
                        $itemType,

                    'jumlah' =>
                        $jumlah,

                    'harga' =>
                        $harga,

                    'subtotal' =>
                        $subtotal,
                ]);


                /*
                |--------------------------------------------------------------------------
                | KURANGI STOK
                |--------------------------------------------------------------------------
                */

                $produk->decrement(
                    'stok',
                    $jumlah
                );
            }


            DB::commit();


            /*
            |--------------------------------------------------------------------------
            | KE PEMBAYARAN
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->route(
                    'user.pembayaran.index',
                    $pemesanan->id
                )
                ->with(
                    'success',
                    'Pesanan berhasil dibuat. Silakan lakukan pembayaran.'
                );


        } catch (\Throwable $e) {

            DB::rollBack();


            return back()
                ->withInput()
                ->with(
                    'error',
                    'Pesanan gagal disimpan: ' .
                    $e->getMessage()
                );
        }
    }


    /**
     * =========================================================
     * DETAIL PESANAN
     * =========================================================
     */
    public function showPesanan($id)
    {
        $user = auth()->user();


        $customer = Customer::where(
            'email',
            $user->email
        )->first();


        if (!$customer) {
            abort(404);
        }


        $pemesanan = Pemesanan::where(
            'id',
            $id
        )
        ->where(
            'customer_id',
            $customer->id
        )
        ->with([
            'details',
            'pembayaran'
        ])
        ->firstOrFail();


        return view(
            'user.pesanan.show',
            compact('pemesanan')
        );
    }


    /**
     * =========================================================
     * PEMBAYARAN
     * =========================================================
     */
    public function pembayaran($pemesanan)
    {
        $user = auth()->user();


        $customer = Customer::where(
            'email',
            $user->email
        )->first();


        if (!$customer) {
            abort(404);
        }


        $pemesanan = Pemesanan::where(
            'id',
            $pemesanan
        )
        ->where(
            'customer_id',
            $customer->id
        )
        ->with([
            'details',
            'pembayaran'
        ])
        ->firstOrFail();


        return view(
            'user.pembayaran.index',
            compact('pemesanan')
        );
    }


    /**
     * =========================================================
     * SIMPAN PEMBAYARAN
     * =========================================================
     */
    public function storePembayaran(
        Request $request,
        $pemesanan
    ) {
        return back()->with(
            'success',
            'Data pembayaran berhasil diproses.'
        );
    }


    /**
     * =========================================================
     * RIWAYAT
     * =========================================================
     */
    public function riwayat()
    {
        $user = auth()->user();


        $customer = Customer::where(
            'email',
            $user->email
        )->first();


        if (!$customer) {

            $pemesanans = collect();

        } else {

            $pemesanans = Pemesanan::where(
                'customer_id',
                $customer->id
            )
            ->with([
                'details',
                'pembayaran'
            ])
            ->orderBy(
                'created_at',
                'desc'
            )
            ->get();
        }


        return view(
            'user.riwayat.index',
            compact('pemesanans')
        );
    }
}