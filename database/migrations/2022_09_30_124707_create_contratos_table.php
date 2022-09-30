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
            $table->id();
            $table->text('clausulaDelEvetento');
            $table->text('politicaCancelacion');
            $table->text('plazoDeEntrega');
            $table->unsignedBigInteger('tipopago_id');
            $table->unsignedBigInteger('evento_id');

            $table->foreign('tipopago_id')->references('id')
                  ->on('tipopagos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('evento_id')->references('id')
                  ->on('eventos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

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
