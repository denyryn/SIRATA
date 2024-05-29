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
        Schema::create('dosens', function (Blueprint $table) {
            $table->bigIncrements('id_dosen');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_prodi');
            $table->string('nip', 25)->unique();
            $table->string('nidn', 25)->unique()->nullable();
            // $table->unsignedBigInteger('id_jabatan');
            $table->string('nama_dosen', 150);
            $table->string('gelar_depan', 40)->nullable();
            $table->string('gelar_belakang', 40)->nullable();
            $table->string('golongan', 10)->nullable();

            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users');
            // $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatans');
            $table->foreign('id_prodi')->references('id_prodi')->on('program_studis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
