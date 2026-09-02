<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Menampilkan halaman pembayaran
     */
    public function index(Pemesanan $pemesanan)
    {
        $user = Auth::user();

        // Pastikan pesanan milik user yang sedang login
        if ($pemesanan->customer_id != $user->customer_id) {
            abort(403);
        }

        $pembayaran = Pembayaran::where(
            'pemesanan_id',
            $pemesanan->id
        )->first();

        return view(
            'user.pembayaran.index',
            compact(
                'pemesanan',
                'pembayaran'
            )
        );
    }

    /**
     * Menyimpan pembayaran
     */
    public function store(
        Request $request,
        Pemesanan $pemesanan
    ) {
        $user = Auth::user();

        // Pastikan pesanan milik user yang sedang login
        if ($pemesanan->customer_id != $user->customer_id) {
            abort(403);
        }

        $request->validate([
            'metode_pembayaran' => 'required|string|max:100',
            'jumlah_bayar' => 'required|numeric|min:0',
        ]);

        Pembayaran::updateOrCreate(
            [
                'pemesanan_id' => $pemesanan->id,
            ],
            [
                'metode_pembayaran' => $request->metode_pembayaran,
                'jumlah_bayar' => $request->jumlah_bayar,
                'status' => 'menunggu',
            ]
        );

        return redirect()
            ->route(
                'user.pemesanan.show',
                $pemesanan->id
            )
            ->with(
                'success',
                'Pembayaran berhasil dikirim dan sedang menunggu konfirmasi.'
            );
    }
}