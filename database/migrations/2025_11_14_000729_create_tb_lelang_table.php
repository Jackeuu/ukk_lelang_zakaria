<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_lelang', callback: function (Blueprint $table) {
            $table->id('id_lelang');
            $table->string('id_barang');
            $table->date('tgl_lelang');
            $table->integer('harga_akhir');
            $table->string('id_user');
            $table->string('id_petugas');
            $table->string('status')->enum('dibuka','ditutup');
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
        Schema::dropIfExists('tb_lelang');
    }
};
