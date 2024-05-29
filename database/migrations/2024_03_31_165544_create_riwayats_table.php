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
        Schema::create('riwayats', function (Blueprint $table) {
            $table->bigIncrements('id_riwayat');
            $table->unsignedBigInteger('id_surat');
            $table->string('nama_status');
            $table->string('keterangan_status')->nullable();

            $table->timestamps();

            $table->foreign('id_surat')->references('id_surat')->on('surats');
            // $table->foreign('id_status')->references('id_status')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayats');
    }
};
