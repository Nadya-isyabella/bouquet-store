<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBouquet extends Model
{
    use HasFactory;

    protected $table = 'kategori_bouquets';

    protected $fillable = [
        'nama',
        'gambar',
        'harga',
        'stok',
    ];

    // Relasi balik ke detail pemesanan
    public function pemesananDetails()
    {
        return $this->morphMany(PemesananDetail::class, 'item', 'item_type', 'item_id');
    }
}