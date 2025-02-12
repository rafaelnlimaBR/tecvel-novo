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
        Schema::create('entradas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('valor',8,2)->default(0.00);
            $table->decimal('valor_liquido',8,2)->default(0.00);
            $table->decimal('valor_acrescimo',8,2)->default(0.00);
            $table->decimal('taxa')->default(0.00);
            $table->boolean('repassar_taxa')->default(1);
            $table->foreignId('forma_pagamento_id')->constrained('formas_pagamentos','id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('entradas');
    }
};
