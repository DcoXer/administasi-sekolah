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
        Schema::create('pembayaran_daftar_ulangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->year('tahun_ajaran');
            $table->enum('status', ['sudah_bayar', 'belum_bayar'])->default('belum_bayar');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_daftar_ulangs');
    }
};
