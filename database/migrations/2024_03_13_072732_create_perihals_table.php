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
        Schema::create('perihals', function (Blueprint $table) {
            $table->bigIncrements('id_perihal');
            $table->unsignedBigInteger('id_kategori_surat');
            $table->string('nama_perihal');
            $table->text('nama_tujuan')->nullable();
            $table->text('alamat_tujuan')->nullable();
            $table->text('upper_body')->nullable();
            $table->text('lower_body')->nullable();

            $table->foreign('id_kategori_surat')->references('id_kategori_surat')->on('kategori_surats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perihals');
    }
};
