<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInstitutoTable extends Migration
{
    public function up()
    {
        Schema::create('instituto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->string('web')->nullable();
            $table->string('logo')->nullable(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('instituto');
    }
}
