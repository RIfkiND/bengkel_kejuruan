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
        Schema::create('pemeliharaan_dan_perawatans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('peralatan_atau_mesin_id')->constrained('peralatan_atau_mesins')->cascadeOnDelete();
            $table->enum('jenis', ['perawatan rutin', 'perbaikan']);
            $table->enum('status', ['selesai', 'belum selesai']);
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeliharaan_dan_perawatans');
    }
};
