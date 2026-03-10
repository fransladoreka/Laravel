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
        Schema::create('datamigrans', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->timestamps();
            $table->string('nama');
            $table->string('nik');
            $table->string('no_passport')->nullable();
            $table->date('tgl_mulai_passport')->nullable();
            $table->date('tgl_berakhir_passport')->nullable();
            $table->string('gender');
            $table->date('tgl_lahir');
            $table->string('tempat_lahir');
            $table->string('agama');
            $table->string('provinsi');
            $table->boolean('ex_taiwan');
            $table->string('jenis_paket');
            $table->foreignUlid('paket_kerja')
                ->constrained('paket_kerjas')
                ->cascadeOnDelete();
            $table->boolean('glasses');
            $table->boolean('medical');
            $table->boolean('call_visa');
            $table->string('no_telpon');
            $table->string('alamat');
            $table->string('nama_kontak_darurat');
            $table->string('nomor_kontak_darurat');
            $table->string('pendidikan');
            $table->string('tinggibadan');
            $table->string('beratbadan');
            $table->json('bahasa')->nullable();
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('status_pernikahan');
            $table->string('nama_partner');
            $table->string('son');
            $table->string('daughter');
        });
        // Schema::create('pengalaman_kerjas', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('pelamar_id')->constrained()->onDelete('cascade');
        //     $table->string('negara')->nullable();
        //     $table->string('posisi')->nullable();
        //     $table->string('working_content')->nullable();
        //     $table->integer('mulai')->nullable();
        //     $table->integer('selesai')->nullable();
        //     $table->string('alasan_keluar')->nullable();
        //     $table->timestamps();
        // });
        // Schema::create('dokumens', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('pelamar_id')->constrained()->onDelete('cascade');
        //     $table->string('jenis');
        //     $table->string('file_path');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datamigrans');
    }
};
