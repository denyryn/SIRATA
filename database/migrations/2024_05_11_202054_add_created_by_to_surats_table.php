<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatedByToSuratsTable extends Migration
{
    public function up()
    {
        // Tambahkan kolom 'created_by' ke tabel 'surats'
        Schema::table('surats', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id_user')->on('users');
        });
        
        // Perbaiki nilai yang tidak valid
        DB::table('surats')
            ->leftJoin('users', 'surats.created_by', '=', 'users.id_user')
            ->whereNull('users.id_user')
            ->update(['surats.created_by' => null]);

        // Tambahkan foreign key constraint
        // (Jika diperlukan, Anda dapat menambahkan foreign key constraint di sini)
    }

    public function down()
    {
        // Hapus foreign key constraint
        Schema::table('surats', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by'); // Jika Anda ingin menghapus kolom saat melakukan rollback migrasi
        });
    }
}
