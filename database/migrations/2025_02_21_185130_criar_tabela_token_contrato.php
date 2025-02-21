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
        Schema::create('token_contrato', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('token');
            $table->integer('dias_expirar')->default(1);
            $table->dateTime('data_vencimento');
            $table->integer('acessos')->default(0);
            $table->timestamps();

            $table->foreignId('contrato_id')->constrained('contratos','id')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('token_contrato');
    }
};
