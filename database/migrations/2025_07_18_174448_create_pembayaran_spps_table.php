<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pembayaran_spps', function (Blueprint $table) {
            $table->id();
            $table->string('bulan');
            $table->integer('tahun');
            $table->date('tanggal_bayar');
            $table->unsignedBigInteger('siswa_id');
            $table->integer('jumlah');
            $table->enum('status', ['sudah', 'belum']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran_spps');
    }
};
