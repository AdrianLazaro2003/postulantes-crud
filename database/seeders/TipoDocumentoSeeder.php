<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = ['DNI', 'CARNET DE EXTRANJERIA', 'PASAPORTE'];

        foreach($tipos as $tipo){
            DB::table('tipo_documentos')->insert([
                'documento' => $tipo
            ]);
        }
    }
}
