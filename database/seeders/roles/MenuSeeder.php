<?php

namespace Database\Seeders\roles;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        //
        $seguridad = uniqid();
        $mantenimiento = uniqid();

        DB::table('menus')->insert([
            'nombre' => 'Dashboard',
            'icono' => 'analytics',
            'descripcion' => 'Panel de control de la apliación',
            'ruta' => '/dashboard',
            'nivel_parentesco' => uniqid(),
            'nivel' => '1', // identifica el menus: 1, sub menus: 2
            'orden' => '1', // el orden en que se mostrará menus y sub menús
        ]);

        DB::table('menus')->insert([
            'nombre' => 'Home',
            'icono' => 'home',
            'descripcion' => 'panel principal para todos los usuarios',
            'ruta' => '/home',
            // 'nivel_parentesco' => uniqid(),
            'nivel' => '1', // identifica el menus: 1, sub menus: 2
            'orden' => '2', // el orden en que se mostrará menus y sub menús
        ]);

        DB::table('menus')->insert([
            'nombre' => 'Usuarios',
            'descripcion' => 'Sub menú de seguridad',
            'ruta' => '/usuario',
            'parentesco' => $seguridad,
            'nivel_parentesco' => uniqid(),
            'nivel' => '2',
            'orden' => '1',

        ]);
        DB::table('menus')->insert([
            'nombre' => 'Roles',
            'descripcion' => 'Sub menú de seguridad',
            'ruta' => '/rol',
            'parentesco' => $seguridad,
            'nivel_parentesco' => uniqid(),
            'nivel' => '2',
            'orden' => '2',
        ]);


        DB::table('menus')->insert([
            'nombre' => 'Mantenimiento',
            'icono' => 'settings',
            'descripcion' => 'Menú mantenimiento',
            'nivel_parentesco' => $mantenimiento,
            'nivel' => '1',
            'orden' => '4'
        ]);


        DB::table('menus')->insert([
            'nombre' => 'Categoría',
            'descripcion' => 'Sub menú de mantenimiento',
            'ruta' => '/categoria',
            'parentesco' => $mantenimiento,
            'nivel_parentesco' => uniqid(),
            'nivel' => '2',
            'orden' => '3'
        ]);

        // Menú y sub menú de seguridad
        DB::table('menus')->insert([
            'nombre' => 'Seguridad',
            'icono' => 'verified_user',
            'descripcion' => 'Menú seguridad',
            'nivel_parentesco' => $seguridad,
            'nivel' => '1', // identifica el menus: 1, sub menus: 2
            'orden' => '5', // el orden en que se mostrará menus y sub menús

        ]);
    }
}
