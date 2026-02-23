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
        Schema::create('pengalaman_kerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelamar_id')->constrained()->onDelete('cascade');
            $table->string('negara')->nullable();
            $table->string('posisi')->nullable();
            $table->string('working_content')->nullable();
            $table->integer('mulai')->nullable();
            $table->integer('selesai')->nullable();
            $table->string('alasan_keluar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalaman_kerjas');
    }
};
