<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_item', function (Blueprint $table) {
          $table->increments('id');
          $table->string('merk', 100);
          $table->string('nama_barang', 100);
          $table->string('kapasitas', 100);
          $table->integer('harga');
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
        Schema::dropIfExists('t_item');
    }
}
