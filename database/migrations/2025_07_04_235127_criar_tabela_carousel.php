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
        Schema::create('carousel', function (Blueprint $tabela) {
            $tabela->bigIncrements('id');
            $tabela->string('titulo');
            $tabela->boolean('ativo');
            $tabela->text('texto');
            $tabela->integer('sequencia');
            $tabela->string('imagem');
            $tabela->string('alt')->nullable();
            $tabela->string('link')->nullable();
            $tabela->boolean('tem_link')->default(false);

            $tabela->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carousel');
    }
};
