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
            $table->foreignId('veiculo_id')->nullable()->constrained('veiculos','id')->onUpdate('cascade')->onDelete('cascade');
            $table->text('defeito')->nullable();
            $table->boolean('pedido_orcamento')->default(false);
            $table->boolean('visualizado')->default(false);
            $table->text('solucao')->nullable();
            $table->date('garantia')->nullable();
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
