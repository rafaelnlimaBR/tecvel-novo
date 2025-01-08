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
        Schema::create('historico_entrada', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('historico_id')->constrained('historicos','id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('entrada_id')->constrained('entradas','id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('historico_entrada');
    }
};
