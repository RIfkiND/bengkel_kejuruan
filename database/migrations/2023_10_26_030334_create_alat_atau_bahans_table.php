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
        Schema::create('alat_atau_bahans', function (Blueprint $table) {
            $table->id();
            $table->enum('kode', ['A', 'B']);
            $table->string('nama_alat_atau_bahan');
            $table->string('volume');
            $table->string('satuan');
            $table->string('sumber_dana');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat_atau_bahans');
    }
};
