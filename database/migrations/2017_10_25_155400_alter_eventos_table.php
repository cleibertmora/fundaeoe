<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class AlterEventosTable extends Migration

{

    public function up()

    {

        Schema::table('eventos', function (Blueprint $table) {

            $table->double('MonedaCambio')->after('costo')->nullable();

            $table->string('Moneda')->after('MonedaCambio')->nullable();

        });

    }



    public function down()

    {

        Schema::table('eventos', function (Blueprint $table) {

            $table->dropColumn('Moneda');

            $table->dropColumn('MonedaCambio');

        });

    }

}

