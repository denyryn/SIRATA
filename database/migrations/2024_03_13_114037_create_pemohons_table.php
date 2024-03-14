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
        Schema::create('pemohons', function (Blueprint $table) {
            $table->integer('id_pemohon')->primary();
            $table->integer('id_mahasiswa');
            $table->integer('id_surat');

            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswas');
            $table->foreign('id_surat')->references('id_surat')->on('surats');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemohons');
    }
};
