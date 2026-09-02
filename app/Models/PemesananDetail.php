<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananDetail extends Model
{
    use HasFactory;

    protected $table = 'pemesanan_detail';

    protected $fillable = [
        'pemesanan_id',
        'item_id',
        'item_type',
        'jumlah',
        'harga_satuan',
        'subtotal',
    ];

    /**
     * Relasi ke pemesanan
     */
    public function pemesanan()
    {
        return $this->belongsTo(
            Pemesanan::class,
            'pemesanan_id'
        );
    }

    /**
     * Relasi ke produk
     *
     * Bisa berupa:
     * - KategoriBouquet
     * - Aksesoris
     */
    public function item()
    {
        return $this->morphTo();
    }
}