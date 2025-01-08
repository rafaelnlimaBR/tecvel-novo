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
        Schema::create('comissoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('obs');
            $table->decimal('valor',8,2);
            $table->date('data');
            $table->foreignId('fornecedor_id')->constrained('fornecedores','id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('historico_id')->constrained('historicos','id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('comissoes');
    }
};
