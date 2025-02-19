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
        Schema::create('tipos_notas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->boolean('cliente')->default(0);
            $table->integer('width_imagem')->default(300);
            $table->integer('height_imagem')->default(300);
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

    }
};
