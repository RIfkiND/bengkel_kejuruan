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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('role')->default(0)->comment('0: Guru, 1: Kepala Bengkel, 2: AdminSekolah , 3: Admin, 4: SuperAdmin');
            $table->foreignId('sekolah_id')->nullable()->constrained('sekolahs')->cascadeOnDelete();
            $table->foreignId('guru_id')->nullable()->constrained('gurus')->cascadeOnDelete();
            $table->foreignId('ruangan_id')->nullable()->constrained('ruangans')->cascadeOnDelete();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
