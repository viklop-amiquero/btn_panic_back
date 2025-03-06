<?php

namespace Database\Seeders\business;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('reportes')->insert([
            'categoria_id' => 1,
            'user_id' => 1,
            'cliente_id' => 1,
            'descripcion' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.',
            'direccion' => 'Avenida las palmeras 773'
        ]);

        DB::table('reportes')->insert([
            'categoria_id' => 2,
            'cliente_id' => 1,
            'descripcion' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.',
            'direccion' => 'Avenida las palmeras 773'
        ]);

        DB::table('reportes')->insert([
            'categoria_id' => 3,
            'cliente_id' => 1,
            'descripcion' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.',
            'direccion' => 'Avenida las palmeras 773'
        ]);

        DB::table('reportes')->insert([
            'categoria_id' => 4,
            'user_id' => 1,
            'cliente_id' => 2,
            'descripcion' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.',
            'direccion' => 'Avenida las palmeras 773'
        ]);

        DB::table('reportes')->insert([
            'categoria_id' => 1,
            'user_id' => 1,
            'cliente_id' => 3,
            'descripcion' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.',
            'direccion' => 'Avenida las palmeras 773'
        ]);
    }
}
