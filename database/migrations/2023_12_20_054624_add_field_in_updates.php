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
        Schema::table('updates', function (Blueprint $table) {
            $table->text('sumber_foto')->nullable();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_telp')->nullable();
            $table->string('tahun_tamat')->nullable();
            $table->text('lokasi_praktek_1')->nullable();
            $table->text('lokasi_praktek_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('updates', function (Blueprint $table) {
            //
        });
    }
};
