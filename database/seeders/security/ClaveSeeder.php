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
        DB::table('claves')->insert([
            'clave_hash' => Hash::make('01547896'),
            'clave_reset' => Hash::make('01547896'),
        ]);

        DB::table('claves')->insert([
            'clave_hash' => Hash::make('12547896'),
            'clave_reset' => Hash::make('12547896'),
        ]);

        DB::table('claves')->insert([
            'clave_hash' => Hash::make('correo'),
            'clave_reset' => Hash::make('78542136'),
        ]);

        DB::table('claves')->insert([
            'clave_hash' => Hash::make('correo'),
            'clave_reset' => Hash::make('78542136'),
        ]);

        DB::table('claves')->insert([
            'clave_hash' => Hash::make('correo'),
            'clave_reset' => Hash::make('78542136'),
        ]);

        DB::table('claves')->insert([
            'clave_hash' => Hash::make('correo'),
            'clave_reset' => Hash::make('78542136'),
        ]);

        DB::table('claves')->insert([
            'clave_hash' => Hash::make('correo'),
            'clave_reset' => Hash::make('78542136'),
        ]);

        DB::table('claves')->insert([
            'clave_hash' => Hash::make('correo'),
            'clave_reset' => Hash::make('78542136'),
        ]);

        DB::table('claves')->insert([
            'clave_hash' => Hash::make('correo'),
            'clave_reset' => Hash::make('78542136'),
        ]);
    }
}
