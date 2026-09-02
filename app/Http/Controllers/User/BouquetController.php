<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;

class BouquetController extends Controller
{
    /**
     * =====================================================
     * STATUS BOUQUET USER
     * =====================================================
     */
    public function index()
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | CARI CUSTOMER BERDASARKAN EMAIL USER LOGIN
        |--------------------------------------------------------------------------
        */

        $customer = Customer::where(
            'email',
            $user->email
        )->first();

        /*
        |--------------------------------------------------------------------------
        | JIKA CUSTOMER BELUM ADA
        |--------------------------------------------------------------------------
        */

        if (!$customer) {

            $pemesanans = collect();

        } else {

            /*
            |--------------------------------------------------------------------------
            | AMBIL PESANAN YANG BELUM SELESAI
            |--------------------------------------------------------------------------
            |
            | Pesanan dengan status "selesai" tidak akan ditampilkan
            | lagi di Status Bouquet karena sudah masuk ke Riwayat.
            |
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
        |--------------------------------------------------------------------------
        | KIRIM DATA KE VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'user.bouquet.index',
            compact('pemesanans')
        );
    }
}