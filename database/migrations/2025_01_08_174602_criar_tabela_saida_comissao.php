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
        Schema::create('saida_comissao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('saida_id')->constrained('saidas','id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('comissao_id')->constrained('comissoes','id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('saida_comissao');
    }
};
