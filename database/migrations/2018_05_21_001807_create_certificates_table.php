<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateCertificatesTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('certificates', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('user_id')->unsigned();

            $table->integer('evento_id')->unsigned();

            $table->timestamps();



            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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

        Schema::dropIfExists('certificates');

    }

}

