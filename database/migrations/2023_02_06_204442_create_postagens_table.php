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
        Schema::create('postagens', function (Blueprint $table) {
            $table->id();
            //Titulo da postagem
            $table->string('titulo');
            //Conteudo da postagem
            $table->text('conteudo');
            //Texto da legenda do post
            $table->text('legenda');
            //Data de criação da postagem
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postagems');
    }
};
