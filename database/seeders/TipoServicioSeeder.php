<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TipoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = ['VIRTUAL', 'PRESENCIAL', 'VIRTUAL/PRESENCIAL'];

        foreach($tipos as $tipo){
            DB::table('tipo_servicios')->insert([
                'servicio' => $tipo
            ]);
        }
    }
}
