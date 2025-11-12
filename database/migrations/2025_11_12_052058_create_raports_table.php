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
        Schema::create('raports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->string('semester'); // 1 or 2
            $table->year('tahun_ajaran'); // 2024, 2025, etc
            $table->decimal('nilai_rata_rata', 5, 2)->nullable(); // Average of all grades
            $table->foreignId('wali_kelas_id')->nullable()->constrained('gurus')->onDelete('set null');
            $table->text('catatan_wali_kelas')->nullable(); // Class teacher comments
            $table->text('catatan_kepala_sekolah')->nullable(); // Principal comments
            $table->boolean('sudah_dicetak')->default(false);
            $table->dateTime('tanggal_cetak')->nullable();
            $table->timestamps();
            
            $table->unique(['siswa_id', 'semester', 'tahun_ajaran']); // One raport per student per semester
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raports');
    }
};
