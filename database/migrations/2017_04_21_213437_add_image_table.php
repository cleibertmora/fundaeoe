<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageTable extends Migration
{
    public function up()
    {
        Schema::create('images', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('album_id')->unsigned();
            $table->string('image');
            $table->string('description');
            $table->integer('publicar')->default(0);
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('images');
    }
}
