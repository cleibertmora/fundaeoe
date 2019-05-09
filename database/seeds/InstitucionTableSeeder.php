<?php

use Illuminate\Database\Seeder;

class InstitucionTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('instituto')->insert(['id' => '1', 'descripcion' => 'Universidad de Los Andes', 'web' => 'http://www.ula.ve/']);
        DB::table('instituto')->insert(['id' => '2', 'descripcion' => 'Universidad Central de Venezuela', 'web' => 'http://www.ucv.ve/']);
        DB::table('instituto')->insert(['id' => '3', 'descripcion' => 'La Universidad del Zulia', 'web' => 'http://www.luz.edu.ve/']);
        DB::table('instituto')->insert(['id' => '4', 'descripcion' => 'U.N.E.L.L.E.Z', 'web' => 'http://www.unellez.edu.ve/unellez/']);
        DB::table('instituto')->insert(['id' => '5', 'descripcion' => 'Universidad de Carabobo', 'web' => 'http://www.uc.edu.ve/']);
        DB::table('instituto')->insert(['id' => '6', 'descripcion' => 'Universidad Católica del Táchira', 'web' => 'http://www.ucat.edu.ve/']);
        DB::table('instituto')->insert(['id' => '7', 'descripcion' => 'Universidad Bicentenaria de Aragua', 'web' => 'http://www.uba.edu.ve/']);
        DB::table('instituto')->insert(['id' => '8', 'descripcion' => 'Universidad Arturo Michelena', 'web' => 'http://www.uam.edu.ve/']);
        DB::table('instituto')->insert(['id' => '9', 'descripcion' => 'Universidad Fermin Toro', 'web' => 'http://www.uft.edu.ve/']);
        DB::table('instituto')->insert(['id' => '10', 'descripcion' => 'Universidad Yacambu', 'web' => 'http://www.uny.edu.ve/']);
        DB::table('instituto')->insert(['id' => '11', 'descripcion' => 'Universidad Valle del Monboy', 'web' => 'http://www.uvm.edu.ve/']);
        DB::table('instituto')->insert(['id' => '12', 'descripcion' => 'Universidad Dr. Rafael Belloso Chacin', 'web' => 'http://www.urbe.edu/']);
        DB::table('instituto')->insert(['id' => '13', 'descripcion' => 'Universidad Rafael Urdaneta', 'web' => 'http://www.uru.edu/']);
        DB::table('instituto')->insert(['id' => '14', 'descripcion' => 'Universidad Católica Andrés Bello', 'web' => 'http://www.ucab.edu.ve/']);
        DB::table('instituto')->insert(['id' => '15', 'descripcion' => 'Universidad Metropolitana', 'web' => 'http://www.unimet.edu.ve/']);
        DB::table('instituto')->insert(['id' => '16', 'descripcion' => 'Universidad Santa María', 'web' => 'http://www.usm.edu.ve/']);
        DB::table('instituto')->insert(['id' => '17', 'descripcion' => 'Universidad Gran Mariscal de Ayacucho', 'web' => 'http://www.ugma.edu.ve/']);
        DB::table('instituto')->insert(['id' => '18', 'descripcion' => 'Universidad Bolivariana de Venezuela', 'web' => 'http://www.ubv.edu.ve/']);
        DB::table('instituto')->insert(['id' => '19', 'descripcion' => 'Universidad de Margarita', 'web' => 'http://www.unimar.edu.ve/portal/']);
        DB::table('instituto')->insert(['id' => '20', 'descripcion' => 'Universidad Romulo Gallegos', 'web' => 'http://www.unerg.edu.ve/']);
        DB::table('instituto')->insert(['id' => '21', 'descripcion' => 'Universidad José Antonio Páez', 'web' => 'http://www.ujap.edu.ve/Universitas/html/principal/']);
        DB::table('instituto')->insert(['id' => '22', 'descripcion' => 'Universidad de Falcón', 'web' => 'http://www.udefa.edu.ve/']);
        DB::table('instituto')->insert(['id' => '23', 'descripcion' => 'Universidad Santa Ines', 'web' => 'http://www.usi.edu.ve/']);
        DB::table('instituto')->insert(['id' => '24', 'descripcion' => 'Otras', 'web' => 'http://www.google.com']);
        DB::table('instituto')->insert(['id' => '25', 'descripcion' => 'Universidad de Oriente ( Núcleo Bolivar )', 'web' => 'http://www.bolivar.udo.edu.ve/']);
        DB::table('instituto')->insert(['id' => '26', 'descripcion' => 'Universidad de Oriente ( Núcleo de Nueva Esparta )', 'web' => 'http://www.ne.udo.edu.ve/']);
        DB::table('instituto')->insert(['id' => '27', 'descripcion' => 'Universidad de Oriente ( Núcleo de Monagas )', 'web' => 'http://www.monagas.udo.edu.ve/']);
        DB::table('instituto')->insert(['id' => '28', 'descripcion' => 'Universidad de Oriente ( Núcleo de Sucre )', 'web' => 'http://www.sucre.udo.edu.ve/']);
        DB::table('instituto')->insert(['id' => '29', 'descripcion' => 'Universidad de Oriente  ( Núcleo de Anzoátegui )', 'web' => 'http://www.anz.udo.edu.ve/']);
        DB::table('instituto')->insert(['id' => '30', 'descripcion' => 'Universidad José María Vargas', 'web' => '']);
        DB::table('instituto')->insert(['id' => '31', 'descripcion' => 'Universidad Nacional Experimental Francisco de Miranda', 'web' => '']);
        DB::table('instituto')->insert(['id' => '32', 'descripcion' => 'DIRECCION INTERNACIONAL DE CIENCIAS FORENSES', 'web' => '']);
        DB::table('instituto')->insert(['id' => '33', 'descripcion' => 'WAWFE (ASOCIACION MUNDIAL FEMENINA DE EXPERTAS EN CIENCIAS FORENSES)', 'web' => '']);
        DB::table('instituto')->insert(['id' => '34', 'descripcion' => 'FUNDACIÓN EL OBSERVATORIO ESTUDIANTIL - FUNDAEOE', 'web' => 'http://www.fundaeoe.com/']);
        DB::table('instituto')->insert(['id' => '35', 'descripcion' => 'SOFIA (SOCIEDAD DE ODONTOESTOMATOLOGOS FORENSES IBEROAMERICANOS)', 'web' => '']);
    }
}
