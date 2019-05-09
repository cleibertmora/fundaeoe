<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
		DB::table('users')->insert(['id' => '1', 'instituto_id' => '24', 'documento' => '405396628', 'tipoDocumento' => 'J', 'primerNombre' => 'Nelson', 'primerApellido' => 'Vicuña', 'sexo' => 'M', 'fechaNacimiento' => '1971-03-20', 'email' => 'nvicuna@gmail.com', 'contrasena' => '1qazxsw2', 'password' => '$2y$10$dGHMuJCPiiaYt2QtAxdmsuIlbGlro7qwjFEnHeCIlWPhacLoScFVa', 'condicion' => '1', 'sms' => '1', 'sCorreo' => '1', 'saldo' => '0', 'type' => 'admin', 'pais' => 'VE']);
		DB::table('users')->insert(['id' => '2', 'instituto_id' => '34', 'documento' => '314737317', 'tipoDocumento' => 'J', 'primerNombre' => 'Roger', 'primerApellido' => 'Rosario', 'sexo' => 'M', 'fechaNacimiento' => '1971-03-20', 'email' => 'admin@fundaeoe.org', 'contrasena' => '1qazxsw2', 'password' => '$2y$10$dGHMuJCPiiaYt2QtAxdmsuIlbGlro7qwjFEnHeCIlWPhacLoScFVa', 'condicion' => '1', 'sms' => '1', 'sCorreo' => '1', 'saldo' => '0', 'type' => 'admin', 'pais' => 'VE']);
	}
}
