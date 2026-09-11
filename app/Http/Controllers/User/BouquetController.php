<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;

class BouquetController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN STATUS BOUQUET
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        /*
         * Ambil user yang sedang login.
         */
        $user = Auth::user();

        /*
         * Cari customer berdasarkan email user.
         */
        $customer = Customer::where(
            'email',
            $user->email
        )->first();

        /*
         * Jika customer tidak ditemukan,
         * tampilkan data kosong.
         */
        if (!$customer) {

            $pemesanans = collect();

        } else {

            /*
             * Ambil semua pesanan milik customer
             * yang belum selesai.
             *
             * Pesanan dengan status selesai
             * akan masuk ke halaman Riwayat.
             */
            $pemesanans = Pemesanan::where(
                'customer_id',
                $customer->id
            )
            ->where(
                'status',
                '!=',
                'selesai'
            )
            ->with([
                'customer',
                'details',
                'pembayaran'
            ])
            ->orderBy(
                'created_at',
                'desc'
            )
            ->get();
        }

        /*
         * Kirim data pesanan ke halaman Status Bouquet.
         */
        return view(
            'user.bouquet.index',
            compact('pemesanans')
        );
    }
}
