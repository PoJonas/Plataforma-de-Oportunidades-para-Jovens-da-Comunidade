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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->string('titulo', 60);
            $table->text('descricao');
            $table->string('organizacao_responsavel', 100);
            $table->string('local', 50);
            $table->string('publico_alvo', 100);
            $table->boolean('is_gratuito')->default(false);
            $table->integer('valor')->nullable();
            $table->boolean('possui_certificado')->default(false);
            $table->date('data_inicio');
            $table->date('data_fim')->nullable();
            $table->time('hora_inicio');
            $table->time('hora_fim')->nullable();
            $table->integer('limite_vagas')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('visualizacoes')->default(0);
            $table->softDeletes('deleted_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
