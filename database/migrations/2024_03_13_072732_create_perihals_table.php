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
        Schema::create('perihals', function (Blueprint $table) {
            $table->integer('id_perihal')->primary();
            $table->integer('id_kategori_surat');
            $table->string('nama_perihal');
            $table->text('template')->nullable();

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
