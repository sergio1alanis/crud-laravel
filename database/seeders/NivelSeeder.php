<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Arreglo niveles con los valores de PRIMERO A SEXTO
        $niveles = ['PRIMERO','SEGUNDO','TERCERO','CUARTO','QUINTO','SEXTO'];
        // Recorremos el arreglo de niveles
        foreach ($niveles as $nivel) {
            DB::table('niveles')->insert([
                'nombre' => $nivel,
            ]);
            }

    }
}
