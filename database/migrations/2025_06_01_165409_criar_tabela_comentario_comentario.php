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
        Schema::create('comentario_comentario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('comentario_id')->constrained('comentarios','id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('resposta_id')->constrained('comentarios','id')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentario_comentario');
    }
};
