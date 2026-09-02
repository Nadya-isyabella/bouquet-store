<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    /**
     * =========================================================
     * RIWAYAT PEMESANAN USER
     * =========================================================
     */
    public function index()
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | CARI CUSTOMER BERDASARKAN EMAIL USER
        |--------------------------------------------------------------------------
        |
        | Pesanan user dihubungkan melalui customer_id.
        | Jadi kita cari customer yang emailnya sama dengan
        | email akun yang sedang login.
        |
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

            $riwayat = collect();

            return view(
                'user.riwayat.index',
                compact('riwayat')
            );
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL PESANAN YANG SUDAH SELESAI
        |--------------------------------------------------------------------------
        |
        | Saat admin mengubah status pesanan menjadi "selesai",
        | pesanan otomatis masuk ke sini.
        |
        */

        $riwayat = Pemesanan::with([
            'customer',
            'details'
        ])
        ->where(
            'customer_id',
            $customer->id
        )
        ->where(
            'status',
            'selesai'
        )
        ->latest()
        ->get();

        /*
        |--------------------------------------------------------------------------
        | KIRIM KE VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'user.riwayat.index',
            compact('riwayat')
        );
    }
}
