<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFormapagoTable extends Migration
{
    public function up()
    {
        Schema::create('formapago', function (Blueprint $table) {
            $table->increments('id');
            $table->string('forma',20);
            $table->string('adicional',1);
            $table->string('tipo',24)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('formapago');
    }
}
