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
        Schema::create('kepribadian_pts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('raport_pts_id')->constrained('raport_pts')->onDelete('cascade');
            $table->string('kelakuan', 10)->nullable();
            $table->string('kerapian', 10)->nullable();
            $table->string('kerajinan', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepribadian_pts');
    }
};
