<?php

namespace Database\Seeders\security;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('claves')->insert(
            [
                'user_id' => 1,
                'clave_hash' => Hash::make('12547896'),
                'clave_reset' => Hash::make('12547896'),
            ],
            [
                'user_id' => 2,
                'clave_hash' => Hash::make('01547896'),
                'clave_reset' => Hash::make('01547896'),
            ],
            [
                'user_id' => 3,
                'clave_hash' => Hash::make('correo'),
                'clave_reset' => Hash::make('78542136'),
            ],
            [
                'user_id' => 4,
                'clave_hash' => Hash::make('correo'),
                'clave_reset' => Hash::make('78542136'),
            ],
            [
                'user_id' => 5,
                'clave_hash' => Hash::make('correo'),
                'clave_reset' => Hash::make('78542136'),
            ],
            [
                'user_id' => 6,
                'clave_hash' => Hash::make('correo'),
                'clave_reset' => Hash::make('78542136'),
            ],
            [
                'user_id' => 7,
                'clave_hash' => Hash::make('correo'),
                'clave_reset' => Hash::make('78542136'),
            ],
            [
                'user_id' => 8,
                'clave_hash' => Hash::make('correo'),
                'clave_reset' => Hash::make('78542136'),
            ],
            [
                'user_id' => 9,
                'clave_hash' => Hash::make('correo'),
                'clave_reset' => Hash::make('78542136'),
            ]

        );
    }
}
