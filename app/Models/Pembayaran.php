<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'pemesanan_id',
        'metode',
        'bukti_pembayaran',
        'status',
        'tanggal_pembayaran',
    ];

    protected $casts = [
        'tanggal_pembayaran' => 'datetime',
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
}