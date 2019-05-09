<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMaterialTable extends Migration
{
    public function up()
    {
        Schema::create('material', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100);
            $table->string('logo',100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('material');
    }
}
