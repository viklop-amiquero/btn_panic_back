<?php

namespace Database\Seeders\roles;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('role_menus')->insert(
            [
                'role_id' => 1,
                'menu_id' => 1,
                'permiso_id' => 1,
            ],
            [
                'role_id' => 1,
                'menu_id' => 2,
                'permiso_id' => 1,
            ],
            [
                'role_id' => 1,
                'menu_id' => 3,
                'permiso_id' => 1,
            ],
            [
                'role_id' => 1,
                'menu_id' => 4,
                'permiso_id' => 1,
            ],
            [
                'role_id' => 1,
                'menu_id' => 5,
                'permiso_id' => 1,
            ],
        );
    }
}
