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
        Schema::create('status_status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('status_atual_id')->constrained('status','id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('status_proximo_id')->constrained('status','id')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_status');
    }
};
