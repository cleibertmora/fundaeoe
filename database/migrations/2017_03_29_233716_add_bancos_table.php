<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBancosTable extends Migration
{
    public function up()
    {
        Schema::create('bancos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100);
            $table->string('logo',100)->nullable();
            $table->string('cuentano',100);
            $table->string('recibo',100)->nullable();
            $table->string('rif',20)->nullable();
            $table->string('empresa',250);
            $table->enum('pais',['VE','CO'])->default('VE');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bancos');
    }
}
