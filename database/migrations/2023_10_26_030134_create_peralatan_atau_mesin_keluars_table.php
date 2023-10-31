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
        Schema::create('peralatan_atau_mesin_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal_keluar');
            $table->foreignId('peralatan_atau_mesin_id')->constrained('peralatan_atau_mesins')->cascadeOnDelete();
            $table->text('alasan_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peralatan_atau_mesin_keluars');
    }
};
