<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([SetorSeeder::class]);
        $this->call([PlanoSeeder::class]);
        $this->call([ColaboradorSeeder::class]);
        $this->call([ClienteSeeder::class]);
        $this->call([AtendimentoSeeder::class]);
    }
}
