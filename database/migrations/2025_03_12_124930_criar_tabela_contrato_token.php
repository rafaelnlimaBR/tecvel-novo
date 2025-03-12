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
        Schema::create('contrato_token', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('contrato_id')->constrained('contratos','id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('token_id')->constrained('tokens','id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('contrato_token');
    }
};
