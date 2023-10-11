<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<10; $i++) {
            DB::table('cliente')->insert([
                'nome'=>$faker->name,
                'cpf'=>$faker->cpf,
                'data_nascimento'=>$faker->date($format = 'Y-m-d', $max = 'now'),
                'endereco'=>$faker->streetAddress,
                'plano_id'=>$faker->numberBetween($min = 1, $max = 10),
            ]);
        }
    }
    
    public function plano(){
        return $this->belongsTo(Plano::class,
        // 1 - 1  (um cliente tem um plano)
            'plano_id', 'id');
    }
}
