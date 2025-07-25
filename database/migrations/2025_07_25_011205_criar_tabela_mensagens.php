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
        Schema::create('mensagens', function (Blueprint $tabela) {
            $tabela->bigIncrements('id');
            $tabela->string('texto');
            $tabela->boolean('visto')->default(false);
            $tabela->foreignId('cliente_id')->constrained('clientes','id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('mensagens');
    }
};
