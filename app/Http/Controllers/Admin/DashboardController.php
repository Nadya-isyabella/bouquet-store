<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\KategoriBouquet;
use App\Models\Petugas;
use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * =========================================================
     * DASHBOARD ADMIN
     * =========================================================
     */
    public function index()
    {
        // =====================================================
        // STATISTIK UTAMA
        // =====================================================

        /**
         * Total Customer
         */
        $totalCustomer = Customer::count();


        /**
         * Total Bouquet
         */
        $totalBouquet = KategoriBouquet::count();


        /**
         * Total Petugas
         */
        $totalPetugas = Petugas::count();


        /**
         * Total Pesanan AKTIF
         *
         * Hanya menghitung pesanan:
         * - pending
         * - diproses
         *
         * Pesanan selesai dan batal tidak dihitung
         * karena sudah tidak berada di Data Pemesanan aktif.
         */
        $totalPesanan = Pemesanan::whereIn('status', [
            'pending',
            'diproses'
        ])->count();


        // =====================================================
        // STATISTIK PESANAN
        // =====================================================

        /**
         * Pesanan baru / menunggu diproses
         */
        $pesananBaru = Pemesanan::where(
            'status',
            'pending'
        )->count();


        /**
         * Pesanan sedang diproses
         */
        $pesananDiproses = Pemesanan::where(
            'status',
            'diproses'
        )->count();


        /**
         * Pesanan selesai
         */
        $pesananSelesai = Pemesanan::where(
            'status',
            'selesai'
        )->count();


        /**
         * Pesanan batal
         */
        $pesananBatal = Pemesanan::where(
            'status',
            'batal'
        )->count();


        // =====================================================
        // TOTAL PENDAPATAN
        // =====================================================

        /**
         * Pendapatan hanya dihitung dari
         * pesanan yang sudah selesai.
         */
        $totalPendapatan = Pemesanan::where(
            'status',
            'selesai'
        )->sum('total_harga');


        // =====================================================
        // DATA CUSTOMER TERBARU
        // =====================================================

        $recentCustomers = Customer::latest()
            ->take(5)
            ->get();


        // =====================================================
        // DATA PESANAN TERBARU
        // =====================================================

        /**
         * Hanya tampilkan pesanan aktif
         * pada bagian Pesanan Terbaru.
         *
         * Pesanan selesai dan batal tidak ditampilkan
         * di bagian pesanan terbaru dashboard.
         */
        $recentOrders = Pemesanan::with([
            'customer',
            'details.item'
        ])
        ->whereIn('status', [
            'pending',
            'diproses'
        ])
        ->latest('tanggal_pemesanan')
        ->take(5)
        ->get();


        // =====================================================
        // BOUQUET TERLARIS
        // =====================================================

        /**
         * item_type pada PemesananDetail menggunakan:
         *
         * 'bouquet'
         *
         * bukan:
         * KategoriBouquet::class
         */
        $topBouquets = PemesananDetail::select(
                'item_id',
                DB::raw('SUM(jumlah) as total_terjual')
            )
            ->where(
                'item_type',
                'bouquet'
            )
            ->groupBy('item_id')
            ->orderByDesc('total_terjual')
            ->with('item')
            ->take(5)
            ->get();


        // =====================================================
        // PENDAPATAN 6 BULAN TERAKHIR
        // =====================================================

        /**
         * Pendapatan per bulan
         * hanya dari pesanan selesai.
         */
        $pendapatanBulanan = Pemesanan::select(
                DB::raw(
                    'MONTH(tanggal_pemesanan) as bulan'
                ),
                DB::raw(
                    'YEAR(tanggal_pemesanan) as tahun'
                ),
                DB::raw(
                    'SUM(total_harga) as total'
                )
            )
            ->where(
                'status',
                'selesai'
            )
            ->where(
                'tanggal_pemesanan',
                '>=',
                now()->subMonths(6)
            )
            ->groupBy(
                'tahun',
                'bulan'
            )
            ->orderBy(
                'tahun'
            )
            ->orderBy(
                'bulan'
            )
            ->get();


        // =====================================================
        // KIRIM DATA KE DASHBOARD
        // =====================================================

        return view(
            'dashboard.index',
            compact(
                'totalCustomer',
                'totalBouquet',
                'totalPetugas',
                'totalPesanan',
                'totalPendapatan',
                'pesananBaru',
                'pesananDiproses',
                'pesananSelesai',
                'pesananBatal',
                'recentCustomers',
                'recentOrders',
                'topBouquets',
                'pendapatanBulanan'
            )
        );
    }
}