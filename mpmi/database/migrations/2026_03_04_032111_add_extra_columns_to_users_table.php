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
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_name')->nullable()->after('name');
            $table->string('jenis_kelamin')->nullable()->after('user_name');
            $table->string('image_path')->nullable()->after('jenis_kelamin');
            $table->boolean('status')->nullable()->after('image_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['user_name','jenis_kelamin','image_path','status']);
        });
    }
};
