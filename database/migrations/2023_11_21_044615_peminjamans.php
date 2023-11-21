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
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('mobil_id');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->decimal('total_biaya', 8, 2);
            $table->enum('status_peminjaman', ['sedang diproses', 'selesai', 'dibatalkan'])->default('sedang diproses');
            $table->timestamps();

          
            $table->foreign('mobil_id')->references('id')->on('mobils');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
