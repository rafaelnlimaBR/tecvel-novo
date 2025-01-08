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
        Schema::create('pedido_peca_avulsa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('pedido_id')->constrained('pedidos','id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('peca_id')->constrained('pecas_avulsas','id')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('valor',8,2);
            $table->date('data');
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
        Schema::dropIfExists('pedido_peca_avulsa');
    }
};
