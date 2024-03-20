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
        Schema::create('tanda_tangans', function (Blueprint $table) {
            $table->bigIncrements('id_tanda_tangan');
            $table->unsignedBigInteger('id_dosen');
            $table->string('path_tanda_tangan');

            $table->timestamps();

            $table->foreign('id_dosen')->references('id_dosen')->on('dosens');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanda_tangans');
    }
};
