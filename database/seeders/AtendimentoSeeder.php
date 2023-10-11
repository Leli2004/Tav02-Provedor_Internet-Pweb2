<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AtendimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<10; $i++) {
            DB::table('atendimento')->insert([
                'tipo'=>$faker->word,
                'descricao'=>$faker->sentence($nbWords = 5, $variableNbWords = true),
                'data'=>$faker->date($format = 'Y-m-d', $max = 'now'),
                'hora'=>$faker->time($format = 'H:i', $max = 'now'),
                'cliente_id'=>$faker->numberBetween($min = 1, $max = 10),
                'setor_id'=>$faker->numberBetween($min = 1, $max = 10),
            ]);
        }
    }

    public function cliente(){
        // 1 - 1 (um atendimento tem um cliente)
        return $this->belongsTo(Cliente::class,
            'cliente_id', 'id');
    }

    public function setor(){
        // 1 - n (um atendimento pode ter um ou mais setores envolvidos)
        return $this->hasMany(Setor::class,
            'setor_id', 'id');
    }
}
