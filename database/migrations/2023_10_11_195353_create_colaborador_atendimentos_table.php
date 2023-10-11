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
        Schema::create('colaborador_atendimento', function (Blueprint $table) {
            $table->id();

            $table->foreignId('atendimento_id')->nullable()
            ->constrained('atendimento')->default(null)->onDelete('cascade');

            $table->foreignId('colaborador_id')->nullable()
            ->constrained('colaborador')->default(null)->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaborador_atendimento');
    }
};