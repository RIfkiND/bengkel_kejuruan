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
        Schema::create('alat_atau_bahan_masuks', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_masuk');
            $table->foreignId('alat_atau_bahan_id')->constrained('alat_atau_bahans')->cascadeOnDelete();
            $table->string('sumber_dana')->nullable();
            $table->string('volume');
            $table->string('saldo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat_atau_bahan_masuks');
    }
};
