<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {

            $table->id();

            $table->foreignId('pemesanan_id')
                ->constrained('pemesanans')
                ->cascadeOnDelete();

            $table->string('metode_pembayaran')
                ->nullable();

            $table->decimal('jumlah_bayar', 15, 2)
                ->default(0);

            $table->string('bukti_pembayaran')
                ->nullable();

            $table->enum('status', [
                'menunggu_konfirmasi',
                'dikonfirmasi',
                'ditolak'
            ])->default('menunggu_konfirmasi');

            $table->text('catatan')
                ->nullable();

            $table->timestamp('tanggal_pembayaran')
                ->nullable();

            $table->timestamp('tanggal_konfirmasi')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};