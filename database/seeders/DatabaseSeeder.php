<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Bouquet Store',
            'email' => 'admin@bouquetstore.com',
            'password' => 'admin12345',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Petugas Bouquet Store',
            'email' => 'petugas@bouquetstore.com',
            'password' => 'petugas12345',
            'role' => 'petugas',
        ]);
    }
}