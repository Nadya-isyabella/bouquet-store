<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            // Tambahkan kolom yang hilang
            $table->foreignId('customer_id')->after('id')->constrained('customers')->onDelete('cascade');
            $table->text('alamat')->after('customer_id');
            $table->date('tanggal_pemesanan')->default(now())->after('alamat');
            $table->date('tanggal_pengembalian')->nullable()->after('tanggal_pemesanan');
            $table->decimal('total_harga', 15, 0)->default(0)->after('tanggal_pengembalian');
            $table->enum('status', ['pending', 'diproses', 'selesai', 'batal'])->default('pending')->after('total_harga');
        });
    }

    public function down(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropColumn([
                'customer_id',
                'alamat',
                'tanggal_pemesanan',
                'tanggal_pengembalian',
                'total_harga',
                'status'
            ]);
        });
    }
};