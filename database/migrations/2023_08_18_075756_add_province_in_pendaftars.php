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
        Schema::table('pendaftars', function (Blueprint $table) {
            $table->bigInteger('code_provinsi');
            $table->bigInteger('code_kota');
            $table->bigInteger('code_kecamatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftars', function (Blueprint $table) {
            $table->dropColumn('code_provinsi');
            $table->dropColumn('code_kota');
            $table->dropColumn('code_kecamatan');
        });
    }
};
