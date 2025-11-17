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
        Schema::create('nilai_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->foreignId('guru_bidang_id')->constrained('guru_bidang')->onDelete('cascade');
            $table->integer('nilai_tugas')->nullable(); // 0-100
            $table->integer('nilai_uts')->nullable(); // Mid-term exam
            $table->integer('nilai_uas')->nullable(); // Final exam
            $table->decimal('nilai_akhir', 5, 2)->nullable(); // Calculated: (tugas*20% + uts*30% + uas*50%)
            $table->enum('grade', ['A', 'B', 'C', 'D', 'E'])->nullable();
            $table->text('catatan_guru')->nullable(); // Teacher notes
            $table->timestamps();
            
            $table->unique(['siswa_id', 'guru_bidang_id']); // One grade per student per subject
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_siswas');
    }
};
