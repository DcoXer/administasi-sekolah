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
        Schema::create('raport_pts_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('raport_pts_id')->constrained('raport_pts')->onDelete('cascade');
            $table->foreignId('mapel_id')->constrained('mapels')->onDelete('cascade');
            $table->float('nilai')->default(0);
            $table->float('rata_rata_kelas')->nullable();
            $table->integer('kkm')->default(75);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raport_pts_detail');
    }
};
