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
        Schema::create('kebutuhan_alat_bahan_diklat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('a_atau_b_id')->nullable()->constrained('alat_atau_bahans')->cascadeOnDelete();
            $table->foreignId('m_atau_p_id')->nullable()->constrained('peralatan_atau_mesins')->cascadeOnDelete();
            $table->string('satuan');
            $table->string('jumlah');
            $table->text('keterangan');
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
