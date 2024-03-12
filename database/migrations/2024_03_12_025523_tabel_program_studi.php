<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('Program_Studi', function (Blueprint $table) {
            $table->integer('id_Program_Studi')->primary();
            $table->integer('id_Jurusan');
            $table->string('Nama_Prodi', 50);
        });
        //
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Program_Studi');
        //
    }
};

