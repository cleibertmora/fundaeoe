<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEtapaTable extends Migration
{
    public function up()
    {
        Schema::table('etapa', function (Blueprint $table) {
            $table->enum('financiamiento',['punico','financiado'])->default('punico')->after('titulo');
        });
    }

    public function down()
    {
        Schema::table('etapa', function (Blueprint $table) {
            $table->dropColumn('financiamiento');
        });
    }
}
