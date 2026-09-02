<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanans';

    protected $fillable = [
        'customer_id',
        'alamat',
        'tanggal_pemesanan',
        'tanggal_pengembalian',
        'total_harga',
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function details()
    {
        return $this->hasMany(PemesananDetail::class, 'pemesanan_id');
    }
}