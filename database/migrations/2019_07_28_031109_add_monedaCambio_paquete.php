<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMonedaCambioPaquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paquetes', function (Blueprint $table) {
            $table->float('monedaCambio', 10, 2)->after('costo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paquetes', function (Blueprint $table) {
            $table->float('monedaCambio', 10, 2);
        });
    }
}
