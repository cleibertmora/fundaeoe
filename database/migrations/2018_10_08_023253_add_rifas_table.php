<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class AddRifasTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::table('rifas', function (Blueprint $table) {

            $table->float('valor_ticket', 8, 2);
            $table->string('ganador/a')->nullable();

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::table('rifas', function (Blueprint $table) {

            $table->float('valor_ticket', 8, 2);
            $table->string('ganador/a');

        });

    }

}

