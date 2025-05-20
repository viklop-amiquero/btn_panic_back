<?php

namespace Database\Seeders\roles;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('roles')->insert([
            'nombre' => 'ADMINISTRADOR',
            'descripcion' => 'Rol administrador',
            'estado' => '1',
        ]);

        DB::table('roles')->insert([
            'nombre' => 'SOPORTE',
            'descripcion' => 'Rol administrador',
            'estado' => '1',
        ]);

        DB::table('roles')->insert([
            'nombre' => 'SERENAZGO',
            'descripcion' => 'Rol administrador',
            'estado' => '1',
        ]);
    }
}
