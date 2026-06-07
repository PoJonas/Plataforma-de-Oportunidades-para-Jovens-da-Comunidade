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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->string('cpf_cnpj')->unique();
            $table->boolean('status')->default(true);
            $table->boolean('email_verificado')->default(false)->nullable();
            $table->string('telefone')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->dateTime('ultimo_acesso')->nullable();
            $table->dateTime('deletado_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
