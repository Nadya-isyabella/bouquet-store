<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use App\Models\Customer;
use App\Models\KategoriBouquet;
use App\Models\Aksesoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    /**
     * =========================================================
     * PEMESANAN AKTIF
     * =========================================================
     */
    public function index()
    {
        $pemesanans = Pemesanan::with([
            'customer',
            'details.item'
        ])
        ->whereIn('status', ['pending', 'diproses'])
        ->latest()
        ->get();

        return view(
            'admin.pemesanan.index',
            compact('pemesanans')
        );
    }


    /**
     * =========================================================
     * FORM TAMBAH PEMESANAN
     * =========================================================
     */
    public function create()
    {
        $customers = Customer::orderBy('nama')->get();

        $bouquets = KategoriBouquet::all();

        $aksesoris = Aksesoris::all();

        return view(
            'admin.pemesanan.create',
            compact(
                'customers',
                'bouquets',
                'aksesoris'
            )
        );
    }


    /**
     * =========================================================
     * SIMPAN PEMESANAN
     * =========================================================
     */
    public function store(Request $request)
    {
        $request->validate([

            'nama_customer' =>
                'required|string|max:255',

            'nomor_hp' =>
                'required|string|max:20',

            // EMAIL CUSTOMER
            'email' =>
                'required|email|max:255',

            'alamat' =>
                'required|string',

            'tanggal_pemesanan' =>
                'required|date',

            'tanggal_pengembalian' =>
                'required|date|after_or_equal:tanggal_pemesanan',

            'items' =>
                'required|array|min:1',

            'items.*.item_type' =>
                'required|in:bouquet,aksesoris',

            'items.*.item_id' =>
                'required|integer|min:1',

            'items.*.jumlah' =>
                'required|integer|min:1',

            'items.*.harga_satuan' =>
                'required|numeric|min:0',
        ]);


        DB::beginTransaction();

        try {

            /**
             * =====================================================
             * CARI / BUAT CUSTOMER
             * =====================================================
             */
            $customer = Customer::where(
                'nama',
                $request->nama_customer
            )->first();


            /**
             * =====================================================
             * CUSTOMER BELUM ADA
             * =====================================================
             */
            if (!$customer) {

                $customer = Customer::create([

                    'nama' =>
                        $request->nama_customer,

                    'nomor_hp' =>
                        $request->nomor_hp,

                    // EMAIL DISIMPAN KE CUSTOMER
                    'email' =>
                        $request->email,

                    'alamat' =>
                        $request->alamat,
                ]);

            } else {

                /**
                 * =================================================
                 * CUSTOMER SUDAH ADA
                 * =================================================
                 * Data customer diperbarui dengan data terbaru
                 * dari form pemesanan.
                 */
                $customer->update([

                    'nomor_hp' =>
                        $request->nomor_hp,

                    // EMAIL DIPERBARUI
                    'email' =>
                        $request->email,

                    'alamat' =>
                        $request->alamat,
                ]);
            }


            /**
             * =====================================================
             * BUAT PEMESANAN
             * =====================================================
             */
            $pemesanan = Pemesanan::create([

                'customer_id' =>
                    $customer->id,

                'alamat' =>
                    $request->alamat,

                'tanggal_pemesanan' =>
                    $request->tanggal_pemesanan,

                'tanggal_pengembalian' =>
                    $request->tanggal_pengembalian,

                'total_harga' =>
                    0,

                'status' =>
                    'pending',
            ]);


            $totalHarga = 0;


            /**
             * =====================================================
             * SIMPAN DETAIL + KURANGI STOK
             * =====================================================
             */
            foreach ($request->items as $item) {

                $itemType =
                    $item['item_type'];

                $itemId =
                    (int) $item['item_id'];

                $jumlah =
                    (int) $item['jumlah'];

                $hargaSatuan =
                    (float) $item['harga_satuan'];


                /**
                 * =================================================
                 * AMBIL BARANG + LOCK DATABASE
                 * =================================================
                 */
                if ($itemType === 'bouquet') {

                    $barang = KategoriBouquet::where(
                        'id',
                        $itemId
                    )
                    ->lockForUpdate()
                    ->first();

                    $namaBarang = 'bouquet';

                } else {

                    $barang = Aksesoris::where(
                        'id',
                        $itemId
                    )
                    ->lockForUpdate()
                    ->first();

                    $namaBarang = 'aksesoris';
                }


                /**
                 * =================================================
                 * BARANG TIDAK DITEMUKAN
                 * =================================================
                 */
                if (!$barang) {

                    throw new \Exception(
                        ucfirst($namaBarang) .
                        ' yang dipilih tidak ditemukan.'
                    );
                }


                /**
                 * =================================================
                 * CEK STOK
                 * =================================================
                 */
                if ($barang->stok < $jumlah) {

                    throw new \Exception(

                        'Stok ' .
                        (
                            $barang->nama ??
                            $barang->nama_bouquet ??
                            $barang->nama_aksesoris ??
                            $namaBarang
                        ) .
                        ' tidak mencukupi. ' .

                        'Stok tersedia: ' .
                        $barang->stok .

                        ', jumlah yang diminta: ' .
                        $jumlah .
                        '.'
                    );
                }


                /**
                 * =================================================
                 * KURANGI STOK
                 * =================================================
                 */
                $barang->stok =
                    $barang->stok - $jumlah;

                $barang->save();


                /**
                 * =================================================
                 * HITUNG SUBTOTAL
                 * =================================================
                 */
                $subtotal =
                    $hargaSatuan * $jumlah;


                /**
                 * =================================================
                 * SIMPAN DETAIL
                 * =================================================
                 */
                PemesananDetail::create([

                    'pemesanan_id' =>
                        $pemesanan->id,

                    'item_type' =>
                        $itemType,

                    'item_id' =>
                        $itemId,

                    'harga_satuan' =>
                        $hargaSatuan,

                    'jumlah' =>
                        $jumlah,

                    'subtotal' =>
                        $subtotal,
                ]);


                $totalHarga += $subtotal;
            }


            /**
             * =====================================================
             * UPDATE TOTAL HARGA
             * =====================================================
             */
            $pemesanan->update([

                'total_harga' =>
                    $totalHarga,
            ]);


            DB::commit();


            return redirect()
                ->route('admin.pemesanan.index')
                ->with(
                    'success',
                    'Pemesanan berhasil ditambahkan dan data customer berhasil disimpan.'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors([

                    'error' =>
                        'Gagal menyimpan pemesanan: ' .
                        $e->getMessage(),
                ]);
        }
    }


    /**
     * =========================================================
     * DETAIL PEMESANAN
     * =========================================================
     */
    public function show(Pemesanan $pemesanan)
    {
        $pemesanan->load([
            'customer',
            'details'
        ]);

        return view(
            'admin.pemesanan.show',
            compact('pemesanan')
        );
    }


    /**
     * =========================================================
     * FORM EDIT PEMESANAN
     * =========================================================
     */
    public function edit(Pemesanan $pemesanan)
    {
        $customers =
            Customer::orderBy('nama')->get();

        $bouquets =
            KategoriBouquet::all();

        $aksesoris =
            Aksesoris::all();

        $pemesanan->load([
            'customer',
            'details'
        ]);

        return view(
            'admin.pemesanan.edit',
            compact(
                'pemesanan',
                'customers',
                'bouquets',
                'aksesoris'
            )
        );
    }


    /**
     * =========================================================
     * UPDATE PEMESANAN
     * =========================================================
     */
    public function update(
        Request $request,
        Pemesanan $pemesanan
    ) {

        $request->validate([

            'customer_id' =>
                'required|exists:customers,id',

            'alamat' =>
                'required|string',

            'tanggal_pemesanan' =>
                'required|date',

            'tanggal_pengembalian' =>
                'nullable|date|after_or_equal:tanggal_pemesanan',

            'status' =>
                'required|in:pending,diproses,selesai,dikembalikan,batal',

            'items' =>
                'nullable|array',

            'items.*.item_type' =>
                'required_with:items|in:bouquet,aksesoris',

            'items.*.item_id' =>
                'required_with:items|integer|min:1',

            'items.*.jumlah' =>
                'required_with:items|integer|min:1',

            'items.*.harga_satuan' =>
                'required_with:items|numeric|min:0',
        ]);


        DB::beginTransaction();

        try {

            $statusLama =
                $pemesanan->status;

            $statusBaru =
                $request->status;


            /**
             * =====================================================
             * JIKA STATUS MENJADI BATAL
             * =====================================================
             */
            if (
                $statusBaru === 'batal' &&
                $statusLama !== 'batal'
            ) {

                $this->kembalikanStok(
                    $pemesanan
                );
            }


            /**
             * =====================================================
             * JIKA SEBELUMNYA BATAL LALU DIHIDUPKAN KEMBALI
             * =====================================================
             */
            if (
                $statusLama === 'batal' &&
                $statusBaru !== 'batal'
            ) {

                $this->kurangiStokDariDetail(
                    $pemesanan
                );
            }


            /**
             * =====================================================
             * UPDATE DETAIL / JUMLAH JIKA ADA
             * =====================================================
             */
            if (
                $request->has('items') &&
                is_array($request->items) &&
                $statusLama !== 'batal' &&
                $statusBaru !== 'batal'
            ) {

                $this->kembalikanStok(
                    $pemesanan
                );


                PemesananDetail::where(
                    'pemesanan_id',
                    $pemesanan->id
                )->delete();


                $totalHarga = 0;


                foreach ($request->items as $item) {

                    $itemType =
                        $item['item_type'];

                    $itemId =
                        (int) $item['item_id'];

                    $jumlah =
                        (int) $item['jumlah'];

                    $hargaSatuan =
                        (float) $item['harga_satuan'];


                    if ($itemType === 'bouquet') {

                        $barang = KategoriBouquet::where(
                            'id',
                            $itemId
                        )
                        ->lockForUpdate()
                        ->first();

                    } else {

                        $barang = Aksesoris::where(
                            'id',
                            $itemId
                        )
                        ->lockForUpdate()
                        ->first();
                    }


                    if (!$barang) {

                        throw new \Exception(
                            'Barang tidak ditemukan.'
                        );
                    }


                    if ($barang->stok < $jumlah) {

                        throw new \Exception(
                            'Stok tidak mencukupi untuk barang yang dipilih. ' .
                            'Stok tersedia: ' .
                            $barang->stok .
                            ', jumlah diminta: ' .
                            $jumlah
                        );
                    }


                    $barang->stok -= $jumlah;

                    $barang->save();


                    $subtotal =
                        $hargaSatuan * $jumlah;


                    PemesananDetail::create([

                        'pemesanan_id' =>
                            $pemesanan->id,

                        'item_type' =>
                            $itemType,

                        'item_id' =>
                            $itemId,

                        'harga_satuan' =>
                            $hargaSatuan,

                        'jumlah' =>
                            $jumlah,

                        'subtotal' =>
                            $subtotal,
                    ]);


                    $totalHarga += $subtotal;
                }


                $pemesanan->total_harga =
                    $totalHarga;
            }


            /**
             * =====================================================
             * UPDATE DATA PEMESANAN
             * =====================================================
             */
            $pemesanan->customer_id =
                $request->customer_id;

            $pemesanan->alamat =
                $request->alamat;

            $pemesanan->tanggal_pemesanan =
                $request->tanggal_pemesanan;

            $pemesanan->tanggal_pengembalian =
                $request->tanggal_pengembalian;

            $pemesanan->status =
                $statusBaru;

            $pemesanan->save();


            DB::commit();


            /**
             * =====================================================
             * JIKA SELESAI
             * =====================================================
             */
            if ($statusBaru === 'selesai') {

                return redirect()
                    ->route('admin.riwayat.index')
                    ->with(
                        'success',
                        'Pemesanan berhasil diselesaikan dan masuk ke Riwayat.'
                    );
            }


            return redirect()
                ->route('admin.pemesanan.index')
                ->with(
                    'success',
                    'Pemesanan berhasil diperbarui.'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors([

                    'error' =>
                        'Gagal memperbarui pemesanan: ' .
                        $e->getMessage(),
                ]);
        }
    }


    /**
     * =========================================================
     * RIWAYAT PEMESANAN
     * =========================================================
     */
    public function riwayat(Request $request)
    {
        $query = Pemesanan::with([
            'customer',
            'details'
        ])
        ->where(
            'status',
            'selesai'
        )
        ->latest();


        if ($request->filled('search')) {

            $search =
                $request->search;

            $query->whereHas(
                'customer',
                function ($customerQuery) use ($search) {

                    $customerQuery->where(
                        'nama',
                        'like',
                        '%' . $search . '%'
                    );
                }
            );
        }


        if ($request->filled('status')) {

            if ($request->status === 'selesai') {

                $query->where(
                    'status',
                    'selesai'
                );

            } else {

                $query->whereRaw(
                    '1 = 0'
                );
            }
        }


        if ($request->filled('from')) {

            $query->whereDate(
                'tanggal_pemesanan',
                '>=',
                $request->from
            );
        }


        if ($request->filled('to')) {

            $query->whereDate(
                'tanggal_pemesanan',
                '<=',
                $request->to
            );
        }


        $riwayat = $query
            ->paginate(10)
            ->withQueryString();


        return view(
            'admin.riwayat.index',
            compact('riwayat')
        );
    }


    /**
     * =========================================================
     * DETAIL RIWAYAT
     * =========================================================
     */
    public function riwayatShow(
        Pemesanan $pemesanan
    ) {

        if (
            $pemesanan->status !==
            'selesai'
        ) {

            return redirect()
                ->route('admin.riwayat.index')
                ->with(
                    'error',
                    'Pemesanan tersebut belum selesai.'
                );
        }


        $pemesanan->load([
            'customer',
            'details'
        ]);


        return view(
            'admin.riwayat.show',
            compact('pemesanan')
        );
    }


    /**
     * =========================================================
     * HAPUS PEMESANAN
     * =========================================================
     */
    public function destroy(
        Pemesanan $pemesanan
    ) {

        DB::beginTransaction();

        try {

            $statusSebelumHapus =
                $pemesanan->status;


            /**
             * Jika belum batal,
             * kembalikan stok.
             */
            if ($statusSebelumHapus !== 'batal') {

                $this->kembalikanStok(
                    $pemesanan
                );
            }


            /**
             * Hapus detail.
             */
            PemesananDetail::where(
                'pemesanan_id',
                $pemesanan->id
            )->delete();


            /**
             * Hapus pemesanan.
             */
            $pemesanan->delete();


            DB::commit();


            /**
             * Jika yang dihapus adalah riwayat.
             */
            if ($statusSebelumHapus === 'selesai') {

                return redirect()
                    ->route('admin.riwayat.index')
                    ->with(
                        'success',
                        'Riwayat pemesanan berhasil dihapus dan stok dikembalikan.'
                    );
            }


            return redirect()
                ->route('admin.pemesanan.index')
                ->with(
                    'success',
                    'Pemesanan berhasil dihapus dan stok dikembalikan.'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->with(
                    'error',
                    'Gagal menghapus pemesanan: ' .
                    $e->getMessage()
                );
        }
    }


    /**
     * =========================================================
     * HELPER: KEMBALIKAN STOK
     * =========================================================
     */
    private function kembalikanStok(
        Pemesanan $pemesanan
    ) {

        $details =
            PemesananDetail::where(
                'pemesanan_id',
                $pemesanan->id
            )->get();


        foreach ($details as $detail) {

            if (
                $detail->item_type ===
                'bouquet'
            ) {

                $barang =
                    KategoriBouquet::where(
                        'id',
                        $detail->item_id
                    )
                    ->lockForUpdate()
                    ->first();

            } else {

                $barang =
                    Aksesoris::where(
                        'id',
                        $detail->item_id
                    )
                    ->lockForUpdate()
                    ->first();
            }


            /**
             * Kalau barang masih ada,
             * tambahkan kembali stoknya.
             */
            if ($barang) {

                $barang->stok =
                    $barang->stok +
                    $detail->jumlah;

                $barang->save();
            }
        }
    }


    /**
     * =========================================================
     * HELPER: KURANGI STOK DARI DETAIL
     * =========================================================
     */
    private function kurangiStokDariDetail(
        Pemesanan $pemesanan
    ) {

        $details =
            PemesananDetail::where(
                'pemesanan_id',
                $pemesanan->id
            )->get();


        foreach ($details as $detail) {

            if (
                $detail->item_type ===
                'bouquet'
            ) {

                $barang =
                    KategoriBouquet::where(
                        'id',
                        $detail->item_id
                    )
                    ->lockForUpdate()
                    ->first();

            } else {

                $barang =
                    Aksesoris::where(
                        'id',
                        $detail->item_id
                    )
                    ->lockForUpdate()
                    ->first();
            }


            if (!$barang) {

                throw new \Exception(
                    'Barang pada detail pemesanan tidak ditemukan.'
                );
            }


            /**
             * Cek stok sebelum dikurangi.
             */
            if (
                $barang->stok <
                $detail->jumlah
            ) {

                throw new \Exception(

                    'Stok tidak mencukupi untuk mengaktifkan kembali pesanan. ' .

                    'Stok tersedia: ' .
                    $barang->stok .

                    ', diperlukan: ' .
                    $detail->jumlah
                );
            }


            $barang->stok -=
                $detail->jumlah;

            $barang->save();
        }
    }
}