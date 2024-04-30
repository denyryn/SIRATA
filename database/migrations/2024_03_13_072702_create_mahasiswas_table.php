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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->bigIncrements('id_mahasiswa');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('nim', 25)->unique();
            // $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('id_prodi');
            $table->unsignedBigInteger('id_dosen_pembimbing')->nullable(); //ganti kalo udah fix
            $table->string('nama_mahasiswa', 150);
            // $table->string('no_telp_mahasiswa', 15);

            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users');
            // $table->foreign('id_kelas')->references('id_kelas')->on('kelas');
            $table->foreign('id_prodi')->references('id_prodi')->on('program_studis');
            $table->foreign('id_dosen_pembimbing')->references('id_dosen')->on('dosens');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
