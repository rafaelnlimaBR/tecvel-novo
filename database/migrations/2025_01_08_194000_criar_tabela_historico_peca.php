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
        Schema::create('historico_peca', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('historico_id')->constrained('historicos','id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('peca_id')->constrained('pecas_avulsas','id')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('valor')->default(0);
            $table->decimal('valor_total')->default(0);
            $table->integer('qnt')->default(1);
            $table->decimal('desconto',8,2)->default(0);
            $table->decimal('valor_liquido',8,2)->default(0);
            $table->decimal('valor_liquido_total',8,2)->default(0);
            $table->string('marca')->nullable();
            $table->boolean('cobrar');
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
        Schema::dropIfExists('historico_peca');
    }
};
