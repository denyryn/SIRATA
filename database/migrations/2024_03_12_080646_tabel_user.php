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
        Schema::create('User', function (Blueprint $table) {
            $table->integer('id_user')->primary();
            $table->string('id_username', 30);
            $table->char('password');
            $table->string('email', 50);
            $table->char('akses_id', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('User');
    }
};
