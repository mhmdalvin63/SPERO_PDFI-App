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
            $table->string('bukti_keanggotaan')->nullable();
        });
        
        Schema::table('updates', function (Blueprint $table) {
            $table->enum('jenis_berita', ['umum', 'private']);
            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftars', function (Blueprint $table) {
            $table->dropColumn('bukti_keanggotaan');
        });

        
        Schema::table('updates', function (Blueprint $table) {
            $table->dropColumn('jenis_berita');
            $table->dropColumn('slug');
        });
    }
};
