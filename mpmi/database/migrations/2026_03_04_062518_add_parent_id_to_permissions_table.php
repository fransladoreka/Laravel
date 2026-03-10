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
        Schema::table('permissions', function (Blueprint $table) {
            $table->ulid('parent_id')->nullable()->after('id');
            $table->string('display_name')->nullable()->after('name');
            // $table->foreign('parent_id')
            //     ->references('id')
            //     ->on('permissions')
            //     ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            // $table->dropForeign(['parent_id']);
            $table->dropColumn(['parent_id', 'display_name']);
        });
    }
};
