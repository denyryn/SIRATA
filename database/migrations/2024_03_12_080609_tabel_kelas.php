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
        Schema::create('Kelas', function (Blueprint $table) {
            $table->integer('id_Kelas')->primary();
            $table->integer('id_Prodi');
            $table->string('id_Dosen', 50);
            $table->string('Nama_Kelas', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Kelas');
    }
};
