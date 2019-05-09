<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPonenteTable extends Migration
{
    public function up()
    {
        Schema::create('ponente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',10)->nullable();
            $table->string('nombre',35);
            $table->string('apellido',35);
            $table->string('pais',20)->nullable();
            $table->string('curriculo',100)->nullable();
            $table->string('foto',100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ponente');
    }
}
