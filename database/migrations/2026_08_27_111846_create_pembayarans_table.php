<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {

            $table->id();

            // Relasi ke tabel pemesanans
            $table->foreignId('pemesanan_id')
                ->constrained('pemesanans')
                ->onDelete('cascade');

            // Metode pembayaran
            $table->enum('metode', [
                'bayar_di_tempat',
                'bayar_sekarang',
            ])->nullable();

            // Bukti pembayaran QRIS
            $table->string('bukti_pembayaran')->nullable();

            // Status pembayaran
            $table->enum('status', [
                'belum_bayar',
                'menunggu_konfirmasi',
                'dikonfirmasi',
                'ditolak',
                'lunas',
            ])->default('belum_bayar');

            // Waktu user melakukan pembayaran
            $table->timestamp('tanggal_pembayaran')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};