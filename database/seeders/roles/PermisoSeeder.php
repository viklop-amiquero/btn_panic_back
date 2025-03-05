<?php

namespace Database\Seeders\roles;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('permisos')->insert(
            [
                'create' => 1,
                'read' => 1,
                'update' => 1,
                'delete' => 1,
                'descripcion' => 'Tiene todos los permisos'
            ],
            [
                'create' => 0,
                'read' => 1,
                'update' => 0,
                'delete' => 0,
                'descripcion' => 'Solo lectura'
            ],
            [
                'create' => 1,
                'read' => 0,
                'update' => 0,
                'delete' => 0,
                'descripcion' => 'Solo crea'
            ],
            [
                'create' => 1,
                'read' => 1,
                'update' => 1,
                'delete' => 0,
                'descripcion' => 'Crea, lectura y edita'
            ],
            [
                'create' => 0,
                'read' => 0,
                'update' => 0,
                'delete' => 0,
                'descripcion' => 'Sin acceso'
            ]
        );
    }
}
