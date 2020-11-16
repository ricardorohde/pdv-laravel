<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades')->insert([
            'id' => 1,
            'unidade' => 'kg',
            'status' => '0'
        ]);
        DB::table('unidades')->insert([
            'id' => 2,
            'unidade' => 'grama',
            'status' => '0'
        ]);
        DB::table('unidades')->insert([
            'id' => 3,
            'unidade' => 'un.',
            'status' => '1'
        ]);
        DB::table('unidades')->insert([
            'id' => 4,
            'unidade' => 'fardo',
            'status' => '0'
        ]);
        DB::table('unidades')->insert([
            'id' => 5,
            'unidade' => 'combo',
            'status' => '0'
        ]);
        DB::table('unidades')->insert([
            'id' => 6,
            'unidade' => 'litro',
            'status' => '0'
        ]);
        DB::table('unidades')->insert([
            'id' => 7,
            'unidade' => 'peça',
            'status' => '0'
        ]);
    }
}
