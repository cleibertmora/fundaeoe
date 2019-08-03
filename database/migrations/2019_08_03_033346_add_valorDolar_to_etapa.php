<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddValorDolarToEtapa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('etapa', function (Blueprint $table) {
            $table->float('valorDolar', 10, 2)->after('costo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etapa', function (Blueprint $table) {
            $table->float('valorDolar', 10, 2);
        });
    }
}
