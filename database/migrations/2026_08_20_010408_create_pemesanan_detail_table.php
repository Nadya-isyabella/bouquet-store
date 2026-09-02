<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemesanan_detail', function (Blueprint $table) {
            $table->id();
            
            // Foreign key mengarah ke tabel pemesanans (jamak)
            $table->foreignId('pemesanan_id')
                  ->constrained('pemesanans')
                  ->onDelete('cascade');
            
            $table->enum('item_type', ['bouquet', 'aksesoris']);
            $table->unsignedBigInteger('item_id');
            $table->decimal('harga_satuan', 15, 0);
            $table->integer('jumlah');
            $table->decimal('subtotal', 15, 0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanan_detail');
    }
};