<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyeks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_proyek');
            $table->longText('deskripsi_proyek');
            $table->date('tanggal_mulai');
            $table->date('tanggal_deadline');
            $table->boolean('status');
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyeks');
        $table->dropForeign(['user_id']);
        $table->dropColumn(['user_id', 'status', 'tanggal_deadline', 'tanggal_mulai', 'deskripsi_proyek', 'nama_proyek']);
    }
}
