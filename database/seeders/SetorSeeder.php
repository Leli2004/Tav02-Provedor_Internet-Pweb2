<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<10; $i++) {
            DB::table('setor')->insert([
                'nome'=>$faker->word,
                'codigo'=>$faker->userName,
                'atribuicoes'=>$faker->sentence($nbWords = 5, $variableNbWords = true),
            ]);
        }
    }
}
