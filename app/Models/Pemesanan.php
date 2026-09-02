<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanans';

    protected $fillable = [
        'customer_id',
        'alamat',
        'tanggal_pemesanan',
        'tanggal_pengembalian',
        'total_harga',
        'status',
    ];

    protected $casts = [
        'tanggal_pemesanan' => 'date',
        'tanggal_pengembalian' => 'date',
        'total_harga' => 'integer',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function details()
    {
        // Panggil PemesananDetail::class di sini
        return $this->hasMany(PemesananDetail::class, 'pemesanan_id');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'pemesanan_id');
    }
}