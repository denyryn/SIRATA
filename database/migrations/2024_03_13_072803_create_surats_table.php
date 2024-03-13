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
        Schema::create('surats', function (Blueprint $table) {
            $table->integer('id_surat')->primary();
            $table->integer('id_perihal');
            $table->integer('id_jabatan');
            $table->integer('id_status');
            $table->string('tujuan_surat');
            $table->string('nomor_surat');
            $table->string('email_mahasiswa');
            $table->date('tanggal_surat');
            $table->string('lampiran');

            $table->foreign('id_perihal')->references('id_perihal')->on('perihals');
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatans');
            $table->foreign('id_status')->references('id_status')->on('statuses');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
