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
        Schema::create('configuracao', function (Blueprint $tabela){
            $tabela->bigIncrements('id');
            $tabela->string('nome_principal');
            $tabela->string('nome_segundario');
            $tabela->text('descricao');
            $tabela->text('meta');
            $tabela->string('logo');
            $tabela->string('instagran');
            $tabela->string('whatsapp');
            $tabela->string('email');
            $tabela->string('endereco');
            $tabela->string('cidade');
            $tabela->string('uf');
            $tabela->string('bairro');
            $tabela->string('cep');
            $tabela->bigInteger('abertura');
            $tabela->bigInteger('aprovado');
            $tabela->bigInteger('recusado');
            $tabela->bigInteger('retorno');
            $tabela->bigInteger('concluido');
            $tabela->bigInteger('solicitação_orcamento');
            $tabela->bigInteger('forma_pagamento_preferido');
            $tabela->integer('dias_expirar_token')->default(1);
            $tabela->bigInteger('whatsapp_id')->nullable();




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuracao');
    }
};
