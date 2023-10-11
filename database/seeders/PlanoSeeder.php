<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PlanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<10; $i++) {
            DB::table('plano')->insert([
                'nome'=>$faker->word,
                'tipo'=>$faker->randomElement($array = array ('Residencial','Comercial','Empresarial')),
                'download'=>$faker->numberBetween($min = 10, $max = 500),
                'upload'=>$faker->numberBetween($min = 10, $max = 500),
                'valor'=>$faker->numberBetween($min = 50, $max = 400),
            ]);
        }
    }
}
