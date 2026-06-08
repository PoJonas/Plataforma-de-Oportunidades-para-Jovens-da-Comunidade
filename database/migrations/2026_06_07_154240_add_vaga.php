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
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->string('titulo', 60);
            $table->text('descricao');
            $table->text('requisitos');
            $table->enum('regime', ['Presencial', 'Remoto', 'Hibrido']);
            $table->enum('tipo_contrato', ['CLT', 'PJ', 'A combinar', 'Estágio']);
            $table->enum('modalidade', ['Tempo Integral', 'Meio Período', 'Horário Flexivel']);
            $table->string('carga_horaria', 50);
            $table->string('salario', 100)->nullable();
            $table->text('beneficios');
            $table->boolean('vaga_pcd')->default(false);
            $table->string('imagem')->nullable();
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
        Schema::dropIfExists('vagas');
    }
};
