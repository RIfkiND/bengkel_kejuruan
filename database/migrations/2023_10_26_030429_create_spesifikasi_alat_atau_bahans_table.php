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
        Schema::create('spesifikasi_alat_atau_bahans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('a_atau_b_id')->constrained('alat_atau_bahans')->cascadeOnDelete();
            $table->string('merk');
            $table->string('tipe_atau_model');
            $table->string('dimensi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spesifikasi_alat_atau_bahans');
    }
};
