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
        Schema::create('historicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data');
            $table->text('obs')->nullable();
            $table->foreignId('tipo_id')->constrained('tipos_contratos','id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('status_id')->constrained('status','id')->onDelete('cascade')->onUpdata('cascade');
            $table->foreignId('contrato_id')->constrained('contratos','id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('historicos');
    }
};
