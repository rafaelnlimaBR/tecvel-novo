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
        Schema::create('contratos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('cliente_id')->constrained('clientes','id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('veiculo_id')->constrained('veiculos','id')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->text('defeito')->nullable();
            $table->text('obs')->nullable();
            $table->text('solucao')->nullable();
            $table->date('garantia');
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
        Schema::dropIfExists('contratos');
    }
};
