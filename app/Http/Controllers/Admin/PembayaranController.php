<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('pemesanan')
            ->latest()
            ->get();

        return view('admin.pembayaran.index', compact('pembayarans'));
    }
}