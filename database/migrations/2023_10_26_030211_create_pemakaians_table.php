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
        Schema::create('pemakaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peralatan_atau_mesin_id')->constrained('peralatan_atau_mesins')->cascadeOnDelete();
            $table->date('tanggal_pemakaian');
            $table->time('waktu_awal');
            $table->time('waktu_akhir');
            $table->foreignId('kelas_id')->constrained('kelas')->cascadeOnDelete();
            $table->foreignId('guru_id')->constrained('gurus')->cascadeOnDelete();
            $table->enum('status_pengajuan', ['Pending', 'Disetujui','Ditolak'])->default('Pending');
            $table->enum('status_penggunaan', ['Selesai', 'Belum Selesai'])->default('Belum Selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemakaians');
    }
};
