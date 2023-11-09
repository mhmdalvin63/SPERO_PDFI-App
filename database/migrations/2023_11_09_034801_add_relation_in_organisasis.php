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
        Schema::table('organisasis', function (Blueprint $table) {
            $table->bigInteger('id_posisi')->nullable();
            $table->bigInteger('id_bidang')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organisasis', function (Blueprint $table) {
            //
        });
    }
};
