<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class AddOtrosToTicketsRifasTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::table('tickets_rifas', function (Blueprint $table) {
            
            $table->mediumText('comentario')->nullable();
            $table->integer('usuario_registra')->unsigned();

            $table->foreign('usuario_registra')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

        Schema::table('tickets_rifas', function (Blueprint $table) {

            $table->mediumText('comentario');
            $table->integer('usuario_registra');

        });

    }

}

