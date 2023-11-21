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
        Schema::create('mobils', function (Blueprint $table) {
        $table->id();
        $table->string('merek');
        $table->string('model');
        $table->string('no_plat');
        $table->decimal('tarif_sewa', 8, 2);
        $table->enum('status_peminjaman', ['dipinjam', 'tersedia'])->default('tersedia');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};
