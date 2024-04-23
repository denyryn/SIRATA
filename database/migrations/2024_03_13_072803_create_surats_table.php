<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->bigIncrements('id_surat');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_perihal');
            $table->unsignedBigInteger('id_jabatan');
            $table->unsignedBigInteger('id_status');
            $table->string('tujuan_surat');
            $table->string('nomor_surat');
            $table->date('tanggal_surat');
            $table->string('lampiran');

            $table->timestamps();

            $table->foreign('id_perihal')->references('id_perihal')->on('perihals');
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatans');
            $table->foreign('id_status')->references('id_status')->on('statuses');
            // $table->foreign('id_user')->references('id_user')->on('users');

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
