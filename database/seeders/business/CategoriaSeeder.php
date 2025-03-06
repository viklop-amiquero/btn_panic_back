<?php

namespace Database\Seeders\business;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categorias')->insert([
            'nombre' => 'Violencia Familiar',
            'Descripcion' => 'lorem ipsum lorem '
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Robos',
            'Descripcion' => 'lorem ipsum lorem '
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Maltrato animal',
            'Descripcion' => 'lorem ipsum lorem '
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Conflictos vecinales',
            'Descripcion' => 'lorem ipsum lorem '
        ]);
    }
}
