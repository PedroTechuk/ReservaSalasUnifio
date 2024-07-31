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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("sala_id")->constrained(
                table: 'salas',
                indexName: 'sala_id'
            );
            $table->string('reservado_por');
            $table->timestamp('hora_inicio');
            $table->timestamp('hora_fim');
            $table->boolean('ativo')->default(true);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
