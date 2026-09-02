<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Ubah kolom status menjadi VARCHAR
        |--------------------------------------------------------------------------
        | Supaya status seperti:
        | baru
        | diproses
        | selesai
        | dibatalkan
        | bisa disimpan tanpa error ENUM.
        |--------------------------------------------------------------------------
        */

        DB::statement("
            ALTER TABLE pemesanans
            MODIFY status VARCHAR(50)
            NOT NULL
            DEFAULT 'baru'
        ");
    }

    /**
     * Balikkan migration.
     */
    public function down(): void
    {
        /*
        | Jika ingin rollback, status dikembalikan
        | menjadi VARCHAR biasa.
        */

        DB::statement("
            ALTER TABLE pemesanans
            MODIFY status VARCHAR(50)
            NULL
        ");
    }
};