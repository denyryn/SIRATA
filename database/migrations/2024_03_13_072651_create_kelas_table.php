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
        // Schema::create('kelas', function (Blueprint $table) {
        //     $table->bigIncrements('id_kelas');
        //     $table->unsignedBigInteger('id_prodi');
        //     $table->string('nama_kelas', 30);

        //     $table->timestamps();

        //     $table->foreign('id_prodi')->references('id_prodi')->on('program_studis');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('kelas');
    }
};
