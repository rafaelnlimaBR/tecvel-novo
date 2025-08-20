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
        Schema::create('historico_servico', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('valor',8,2);
            $table->decimal('desconto',8,2)->default(0);
            $table->decimal('valor_liquido',8,2)->default(0);
            $table->date('data');
//            $table->boolean('cobrar');
            $table->foreignId('historico_id')->constrained('historicos','id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('servico_id')->constrained('servicos','id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('historico_servico');
    }
};
