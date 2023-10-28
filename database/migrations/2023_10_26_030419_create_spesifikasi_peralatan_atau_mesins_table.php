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
        Schema::create('spesifikasi_peralatan_atau_mesins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('p_atau_m_id')->constrained('peralatan_atau_mesins')->cascadeOnDelete();
            $table->string('merk');
            $table->string('tipe_atau_model');
            $table->date('tahun');
            $table->string('kapasitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spesifikasi_peralatan_atau_mesins');
    }
};
