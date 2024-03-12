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
        Schema::create('Mahasiswa',  function(Blueprint $table){
            $table->integer('NIM')->primary();
            $table->unsignedBigInteger('id_program_studi');
            $table->char('id_Kelas', 10);
            $table->string('Nama_Mhs', 100);
            $table->string('Email_Mhs', 50);
            $table->integer('Telp_Mhs');

          
    
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_mahasiswa');

        //
    }
};
