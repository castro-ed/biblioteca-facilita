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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');          // Nome do livro
            $table->string('author');         // Autor do livro
            $table->string('registry_number')->unique();  // Número de registro único do livro
            $table->enum('status', ['Disponível','Emprestado'])->default('Disponível');
            $table->foreignId('genre_id')->constrained()->cascadeOnDelete();
            // genre_id: referência ao gênero do livro, com chave estrangeira
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
