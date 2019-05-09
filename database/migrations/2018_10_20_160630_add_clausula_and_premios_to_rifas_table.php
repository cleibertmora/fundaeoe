<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class AddClausulaAndPremiosToRifasTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::table('rifas', function (Blueprint $table) {

            $table->mediumText('clausula')->nullable();
            $table->mediumText('premio')->nullable();

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

            $table->mediumText('clausula');
            $table->mediumText('premio');

        });

    }

}

