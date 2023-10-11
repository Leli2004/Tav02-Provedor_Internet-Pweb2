<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ColaboradorAtendimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<10; $i++) {
            DB::table('colaborador_atendimento')->insert([
                'atendimento_id'=>$faker->numberBetween($min = 1, $max = 10),
                'colaborador_id'=>$faker->numberBetween($min = 1, $max = 10),
            ]);
        }
    }

    public function atendimento(){
        // n - n
        return $this->belongsToMany(Atendimento::class,
            'atendimento_id', 'id');
    }

    public function colaborador(){
        // n - n
        return $this->belongsToMany(Colaborador::class,
            'colaborador_id', 'id');
    }
}
