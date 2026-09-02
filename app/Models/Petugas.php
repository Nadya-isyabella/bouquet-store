<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $fillable = [
        'nama', 'alamat', 'nomor_hp', 'email', 'status'
    ];
}