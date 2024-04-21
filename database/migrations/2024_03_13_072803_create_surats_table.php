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
            $table->unsignedBigInteger('id_jabatan');
            $table->unsignedBigInteger('id_status');
            $table->string('perihal');
            $table->string('tujuan_surat');
            $table->string('nomor_surat');
            $table->date('tanggal_surat');
            $table->text('nama_tujuan');
            $table->text('alamat_tujuan');
            $table->text('upper_body');
            $table->text('lower_body');
            $table->string('lampiran');

            $table->timestamps();

            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatans');
            $table->foreign('id_status')->references('id_status')->on('statuses');
            $table->foreign('id_user')->references('id_user')->on('users');

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
