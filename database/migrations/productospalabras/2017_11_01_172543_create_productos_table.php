<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('idproducto');
            $table->text('titulo')->charset('utf8')->collation('utf8_unicode_ci');;
            $table->longText('descripcion')->charset('utf8')->collation('utf8_unicode_ci');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_termino');
            $table->integer('precio');
            $table->text('imagen')->charset('utf8')->collation('utf8_unicode_ci');;
            $table->integer('vendidos');
            $table->text('tags')->charset('utf8')->collation('utf8_unicode_ci');;
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
        Schema::dropIfExists('productos');
    }
}
