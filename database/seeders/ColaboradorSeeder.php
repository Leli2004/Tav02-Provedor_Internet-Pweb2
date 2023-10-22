<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ColaboradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        for ($i=0; $i<10; $i++) {
            DB::table('colaborador')->insert([
                'nome'=>$faker->name,
                'funcao'=>$faker->word,
                'setor_id'=>$faker->numberBetween($min = 1, $max = 10),
                'imagem'=>$faker->image('storage/app/public/images',640,480, null, false),
            ]);
        }
    }

    public function setor(){
        return $this->hasMany(Setor::class,
        // 1 - n  (um setor pode ter um ou vários colaboradores)
            'setor_id', 'id');
    }
}
