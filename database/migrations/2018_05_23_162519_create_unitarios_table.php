<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unitarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cantidad');
            $table->string('total');
            $table->integer('id_compra')->unsigned();
            $table->foreign('id_compra')->references('id')->on('compras');
            $table->integer('id_libro')->unsigned();
            $table->foreign('id_libro')->references('id')->on('libros');
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
        Schema::dropIfExists('unitarios');
    }
}
