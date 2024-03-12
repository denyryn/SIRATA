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
            $table->integer('nim')->primary();
            $table->char('id_prodi');
            $table->char('id_kelas');
            $table->string('nama_mahasiswa', 100);
            $table->string('email_mahasiswa', 50);
            $table->integer('no_telp_mahasiswa');

          
    
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Mahasiswa');

        //
    }
};
