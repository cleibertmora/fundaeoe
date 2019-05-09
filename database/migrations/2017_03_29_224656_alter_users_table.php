<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class AlterUsersTable extends Migration

{

    public function up()

    {

        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('name');

            $table->integer('instituto_id')->unsigned()->after('id');

            $table->foreign('instituto_id')->references('id')->on('instituto')->onDelete('cascade');

            $table->string('documento',11)->unique()->after('instituto_id');

            $table->string('tipoDocumento',1)->after('documento');

            $table->string('primerNombre',30)->after('tipoDocumento');

            $table->string('segundoNombre',30)->nullable()->after('primerNombre');

            $table->string('primerApellido',30)->after('segundoNombre');

            $table->string('segundoApellido',30)->nullable()->after('primerApellido');

            $table->string('sexo',10)->after('segundoApellido');

            $table->date('fechaNacimiento')->after('sexo');

            $table->string('telefonoPrincipal',20)->nullable()->after('fechaNacimiento');

            $table->string('telefonoCelular',20)->nullable()->after('telefonoPrincipal');

            $table->string('pin',15)->nullable()->after('email');

            $table->string('contrasena',35)->after('pin');

            $table->string('condicion',1)->after('password');

            $table->string('sms',1)->after('condicion');

            $table->string('sCorreo',1)->after('sms');

            $table->double('saldo')->after('sCorreo');

            $table->enum('type',['admin','usuario', 'colaborador'])->default('usuario')->after('saldo');

            $table->string('pais',2)->after('type');

        });

    }



    public function down()

    {

        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('pais');

            $table->dropColumn('type');

            $table->dropColumn('saldo');

            $table->dropColumn('sCorreo');

            $table->dropColumn('sms');

            $table->dropColumn('condicion');

            $table->dropColumn('contrasena');

            $table->dropColumn('pin');

            $table->dropColumn('telefonoCelular');

            $table->dropColumn('telefonoPrincipal');

            $table->dropColumn('fechaNacimiento');

            $table->dropColumn('sexo');

            $table->dropColumn('segundoApellido');

            $table->dropColumn('primerApellido');

            $table->dropColumn('segundoNombre');

            $table->dropColumn('primerNombre');

            $table->dropColumn('tipoDocumento');

            $table->dropColumn('documento');

            $table->dropForeign('users_instituto_id_foreign');

            $table->dropColumn('instituto_id');

            $table->string('name')->after('id');

        });

    }

}

