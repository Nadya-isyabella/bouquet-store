<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'nama',
        'nomor_hp',
        'alamat',
        'email',
    ];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'customer_id');
    }
}