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
            $table->unsignedBigInteger('id_jabatan')->nullable();
            $table->unsignedBigInteger('id_user_pembuat')->nullable(); //added this
            $table->unsignedBigInteger('id_kategori_surat');
            $table->string('nama_perihal');
            $table->string('tujuan_surat')->nullable();
            $table->string('nomor_surat')->nullable();
            // $table->date('tanggal_surat'); 
            $table->text('nama_tujuan');
            $table->text('alamat_tujuan');
            $table->text('upper_body');
            $table->text('lower_body');
            $table->string('lampiran')->nullable();
            $table->string('surat_selesai')->nullable();

            $table->timestamps();

            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatans');
            $table->foreign('id_kategori_surat')->references('id_kategori_surat')->on('kategori_surats');
            $table->foreign('id_user_pembuat')->references('id_user')->on('users');

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
