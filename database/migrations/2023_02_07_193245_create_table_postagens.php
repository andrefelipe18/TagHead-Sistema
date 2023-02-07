<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_postagens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //Criando as colunas da tabela
            $table->string('titulo');
            $table->text('conteudo');
            $table->text('legenda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_postagens');
    }
};
