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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('detalle');
            $table->string('ubicacion');
            $table->string('cantpersonas');
            $table->text('url');
            $table->boolean('eliminado')->default(false);
            $table->unsignedBigInteger('tipoevento_id');
            $table->unsignedBigInteger('organizador_id')->nullable();//prueba el nul
            $table->unsignedBigInteger('estadoevento_id')->default(1);


            $table->foreign('tipoevento_id')->references('id')
                  ->on('tipoeventos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('organizador_id')->references('id')
                  ->on('organizadors')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('estadoevento_id')->references('id')
                  ->on('estadoeventos')
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
        Schema::dropIfExists('eventos');
    }
};
