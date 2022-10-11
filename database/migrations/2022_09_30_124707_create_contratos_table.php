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
            $table->text('detalle');
            $table->text('clausulaDelEvento');
            $table->text('politicaCancelacion');
            $table->text('plazoDeEntrega');
            $table->boolean('eliminado')->default(false);
            $table->unsignedBigInteger('tipopago_id');
            $table->unsignedBigInteger('evento_id');
            $table->unsignedBigInteger('fotografo_id');
            $table->unsignedBigInteger('organizador_id');
            $table->unsignedBigInteger('estado_id')->default(1);
            //0:pendiente 1:aceptado  2:concluido 3:pagado

            $table->foreign('tipopago_id')->references('id')
                  ->on('tipopagos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('evento_id')->references('id')
                  ->on('eventos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('fotografo_id')->references('id')
                  ->on('fotografos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('organizador_id')->references('id')
                  ->on('organizadors')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('estado_id')->references('id')
                  ->on('estados')
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
