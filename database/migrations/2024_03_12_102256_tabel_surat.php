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
        Schema::create('Surat', function (Blueprint $table) {
            $table->integer('id_surat')->primary();
            $table->integer('nim_mahasiswa');
            $table->integer('id_perihal');
            $table->integer('id_pejabat');
            $table->integer('id_status');
            $table->integer('id_kategori_surat');
            $table->string('tujuan_surat', 50);
            $table->integer('nomor_surat');
            $table->string('email_mahasiswa', 50);
            $table->datetime('tanggal_surat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
