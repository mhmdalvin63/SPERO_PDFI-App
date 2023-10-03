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
            $table->enum('status', ['aktif', 'nonaktif'])->nullable();
        }); 

        Schema::table('jurnals', function (Blueprint $table) {
            $table->string('slug')->nullable();
        }); 
        
        Schema::table('agendas', function (Blueprint $table) {
            $table->string('panduan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
