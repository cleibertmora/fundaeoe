<?php

use Illuminate\Database\Seeder;

class FormaPagoTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('formapago')->insert(['id' => '1', 'forma' => 'Transferencia', 'adicional' => '1', 'tipo' => 'Referencia / Movimiento' ]);
        DB::table('formapago')->insert(['id' => '2', 'forma' => 'Depósito en Efectivo', 'adicional' => '2', 'tipo' => 'Referencia / Movimiento' ]);
        DB::table('formapago')->insert(['id' => '3', 'forma' => 'Depósito en Cheque', 'adicional' => '3', 'tipo' => 'Referencia / Movimiento' ]);
        DB::table('formapago')->insert(['id' => '4', 'forma' => 'TDC MisPagos.com', 'adicional' => '4', 'tipo' => 'Número de Transacción' ]);
        DB::table('formapago')->insert(['id' => '5', 'forma' => 'Saldo a Favor', 'adicional' => '5' ]);
        DB::table('formapago')->insert(['id' => '6', 'forma' => 'Mercado Pago', 'adicional' => '6' ]);
    }
}
