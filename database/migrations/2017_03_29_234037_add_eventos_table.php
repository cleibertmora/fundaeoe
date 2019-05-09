<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class AddEventosTable extends Migration

{

    public function up()

    {

        Schema::create('eventos', function (Blueprint $table) {

            $table->increments('id');

            $table->string('titulo',255);

            $table->date('fechaI')->nullable();

            $table->date('fechaF')->nullable();

            $table->integer('capacidad')->nullable();

            $table->integer('horasA')->nullable();

            $table->integer('horasC')->nullable();

            $table->longText('notas')->nullable();

            $table->string('direccion',200);

            $table->string('gps1',50)->nullable();

            $table->string('gps2',50)->nullable();

            $table->string('condicion',1)->nullable();

            $table->double('costo')->nullable();

            $table->string('mapa',1500)->nullable();

            $table->string('afiche',100)->nullable();

            $table->string('banner',100)->nullable();

            $table->enum('type',['congreso','curso','diplomado','jornada','capacitación','emprendimiento'])->default('congreso');

            $table->enum('participacion',['nacional', 'internacional', 'mixto'])->default('nacional');

            $table->timestamps();

        });

    }



    public function down()

    {

        Schema::dropIfExists('eventos');

    }

}

