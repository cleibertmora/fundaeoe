<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEtapaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo',1);
            $table->integer('evento_id')->unsigned();
            $table->integer('paquete_id')->unsigned();
            $table->string('titulo',100);
            $table->integer('descuento');
            $table->double('costo');
            $table->date('fechaI');
            $table->date('fechaF');
            $table->timestamps();
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
            $table->foreign('paquete_id')->references('id')->on('paquetes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etapa');
    }
}
