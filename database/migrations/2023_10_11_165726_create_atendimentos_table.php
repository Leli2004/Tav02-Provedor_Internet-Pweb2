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
        Schema::create('atendimento', function (Blueprint $table) {
            $table->id();
            $table->string('tipo',60);
            $table->string('descricao',200);
            $table->string('data',15);
            $table->string('hora',15);

            $table->foreignId('cliente_id')->nullable()
            ->constrained('cliente')->default(null)->onDelete('cascade');

            $table->foreignId('setor_id')->nullable()
            ->constrained('setor')->default(null)->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendimento');
    }
};
