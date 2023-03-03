<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TipoEstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = ['EN PROCESO', 'DE ALTA'];

        foreach($tipos as $tipo){
            DB::table('tipo_estados')->insert([
                'estado' => $tipo
            ]);
        }
    }
}
