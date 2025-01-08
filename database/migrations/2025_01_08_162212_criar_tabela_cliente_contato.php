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
        Schema::create('cliente_contato', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('cliente_id')->constrained('clientes','id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('contato_id')->constrained('contatos','id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('cliente_contato');
    }
};
