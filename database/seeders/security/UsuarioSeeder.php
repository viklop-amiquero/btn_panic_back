<?php

namespace Database\Seeders\security;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert(
            [
                'persona_id' => 1,
                'role_id' => 1,
                'clave_id' => 1,
                'username' => '75316900',
            ]
        );

        DB::table('users')->insert([
            'persona_id' => 2,
            'role_id' => 1,
            'clave_id' => 2,
            'username' => '75142031',
        ]);

        DB::table('users')->insert(
            [
                'persona_id' => 3,
                'role_id' => 1,
                'clave_id' => 3,
                'username' => '96854712',
            ]
        );

        DB::table('users')->insert([
            'persona_id' => 4,
            'role_id' => 1,
            'clave_id' => 4,
            'username' => '01253640',
        ]);

        DB::table('users')->insert(
            [
                'persona_id' => 5,
                'role_id' => 1,
                'clave_id' => 5,
                'username' => '36021400',
            ]
        );

        DB::table('users')->insert([
            'persona_id' => 6,
            'role_id' => 1,
            'clave_id' => 6,
            'username' => '10250300',
        ]);
    }
}
