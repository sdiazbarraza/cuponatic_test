<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalabraProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('palabra_producto', function (Blueprint $table) {
            $table->increments('idpalabraproducto');
            $table->integer('idpalabra')->unsigned();
            $table->integer('idproducto')->unsigned();
            $table->foreign('idpalabra')->references('idpalabra')->on('palabras')->onDelete('cascade');
            $table->foreign('idproducto')->references('idproducto')->on('productos')->onDelete('cascade');
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
        Schema::dropIfExists('palabra_producto');
    }
}
