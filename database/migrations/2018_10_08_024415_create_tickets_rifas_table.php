<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateTicketsRifasTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('tickets_rifas', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('rifa_id')->unsigned();
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('telefono');
            $table->string('correo');
            $table->string('direccion')->nullable();
            $table->string('institucion')->nullable();
            $table->enum('tipo', ['cedula', 'pasaporte']);
            $table->string('documento');
            $table->string('num_control');

            $table->timestamps();

            $table->foreign('rifa_id')->references('id')->on('rifas')->onDelete('cascade')->onUpdate('cascade');

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::dropIfExists('tickets_rifas');

    }

}

