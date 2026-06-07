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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->string('titulo', 60);
            $table->text('descricao');
            $table->string('instituicao_responsavel', 100);
            $table->string('carga_horaria', 50);
            $table->enum('turno', ['Matutino', 'Vespertino', 'Noturno']);
            $table->boolean('is_gratuito')->default(false);
            $table->integer('valor')->nullable();
            $table->boolean('possui_certificado')->default(false);
            $table->text('pre_requisitos');
            $table->date('data_inicio');
            $table->date('data_fim')->nullable();
            $table->boolean('vaga_pcd')->default(false);
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
