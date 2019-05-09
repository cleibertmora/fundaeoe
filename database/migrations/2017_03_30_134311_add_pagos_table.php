<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('evento_id')->unsigned();
            $table->integer('formapago_id')->unsigned();
            $table->integer('banco_id')->unsigned();
            $table->integer('paquete_id')->unsigned();
            $table->string('documento',20);
            $table->string('cheque',20);
            $table->string('cedula',10)->nullable();
            $table->string('cuenta',4)->nullable();
            $table->string('condicion',1);
            $table->decimal('monto',28,2);
            $table->string('obs',100)->nullable();
            $table->date('fechaTrans');
            $table->date('fechaRegi');
            $table->time('hora');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
            $table->foreign('formapago_id')->references('id')->on('formapago')->onDelete('cascade');
            $table->foreign('banco_id')->references('id')->on('bancos')->onDelete('cascade');
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
        Schema::dropIfExists('pagos');
    }
}
