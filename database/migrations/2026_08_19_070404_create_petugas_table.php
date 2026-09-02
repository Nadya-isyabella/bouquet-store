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
       Schema::create('petugas', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->text('alamat');
    $table->string('nomor_hp');
    $table->string('email')->unique();
    $table->enum('status', ['Aktif', 'Cuti', 'Sakit', 'Nonaktif'])->default('Aktif');
    $table->timestamps();
});
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};