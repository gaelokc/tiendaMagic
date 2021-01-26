<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class usuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
        	[
        		'nombre' => 'Gael',
        		'email' => 'gael@gmail.com',
        		'contraseña' => 'patata'
        	],
        	[
        		'nombre' => 'Lidia',
        		'email' => 'lidia@gmail.com',
        		'contraseña' => 'potato'
        	],
        ]);
    }
}
