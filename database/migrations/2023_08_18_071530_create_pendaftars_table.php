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
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['P', 'L']);
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('email');
            $table->string('no_anggota_idi');
            $table->string('no_anggota_pdfi');
            $table->string('bukti_transfer')->nullable();
            $table->text('cabang');
            $table->foreignId('id_agenda')->references('id')->on('agendas')->onDelete('cascade');
            $table->foreignId('id_tiket')->references('id')->on('tikets')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
