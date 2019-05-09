<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFpagoevenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fpagoeven', function (Blueprint $table) {
            $table->integer('formapago_id')->unsigned();
            $table->integer('evento_id')->unsigned();
            $table->timestamps();
            $table->foreign('formapago_id')->references('id')->on('formapago')->onDelete('cascade');
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fpagoeven');
    }
}
