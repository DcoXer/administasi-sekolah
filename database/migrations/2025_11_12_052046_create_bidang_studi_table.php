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
        Schema::create('bidang_studi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bidang')->unique(); // e.g., Matematika, Bahasa Indonesia
            $table->string('kode_bidang')->unique(); // e.g., MTK, BI
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidang_studi');
    }
};
