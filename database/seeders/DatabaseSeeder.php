<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\business\CategoriaSeeder;
use Database\Seeders\business\ReporteSeeder;
use Database\Seeders\roles\MenuSeeder;
use Database\Seeders\roles\PermisoSeeder;
use Database\Seeders\roles\RoleMenuSeeder;
use Database\Seeders\roles\RoleSeeder;
use Database\Seeders\security\ClaveSeeder;
use Database\Seeders\security\PersonaSeeder;
use Database\Seeders\security\UsuarioSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(PersonaSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(ClaveSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(PermisoSeeder::class);
        $this->call(RoleMenuSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ReporteSeeder::class);
    }
}
