<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();
        
        Schema::create('colaborador', function (Blueprint $table) {
            $table->id();
            $table->String('imagem',150)->nullable();
            $table->string('nome',120);
            $table->string('funcao',50);
            $table->foreignId('setor_id')->nullable()
            ->constrained('setor')->default(null)->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaborador');
    }
};
