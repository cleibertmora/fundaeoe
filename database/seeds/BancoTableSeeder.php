<?php

use Illuminate\Database\Seeder;

class BancoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bancos')->insert(['id' => '1', 'descripcion' => 'BANESCO', 'logo' => 'banesco.jpg', 'cuentano' => '0134 - 0448 - 85 - 4481022122', 'recibo' => 'reciboBanesco.jpg', 'rif' => 'J-31473731-7', 'empresa' => 'FUNDACIÓN EL OBSERVATORIO ESTUDIANTIL (FUNDAEOE)']);
        DB::table('bancos')->insert(['id' => '2', 'descripcion' => 'PROVINCIAL', 'logo' => 'provincial.jpg', 'cuentano' => '0108 - 0105 - 29 - 0100098629', 'recibo' => 'reciboProvincial.jpg', 'rif' => 'J-31473731-7', 'empresa' => 'FUNDACIÓN EL OBSERVATORIO ESTUDIANTIL (FUNDAEOE)']);
        DB::table('bancos')->insert(['id' => '3', 'descripcion' => 'TARJETA DE CRÉDITO / DÉBITO', 'logo' => 'Provincial21.jpg', 'cuentano' => 'ACEPTAMOS TARJETAS DE CRÉDITO DE CUALQUIER BANCO. Al total que Pague debe Incluir el 0.15%', 'recibo' => '', 'rif' => '', 'empresa' => 'www.mispagosprovincial.com (1.- Registrarse; 2.- Buscador empresa "colocar FUNDAEOE y seguir los pasos")']);
    }
}
