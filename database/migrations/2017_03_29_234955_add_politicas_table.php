<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPoliticasTable extends Migration
{
    public function up()
    {
        Schema::create('politicas', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('detalles');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('politicas');
    }
}
