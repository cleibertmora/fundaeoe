<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class AlterEventosTable extends Migration

{

    public function up()

    {

        Schema::table('eventos', function (Blueprint $table) {

            $table->double('inicial')->after('Moneda')->nullable();

            $table->integer('ncuotas')->after('inicial')->nullable();

        });

    }



    public function down()

    {

        Schema::table('eventos', function (Blueprint $table) {

            $table->dropColumn('ncuota');

            $table->dropColumn('inicial');

        });

    }

}

