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
        Schema::create('invitacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('organizador_id');
            $table->unsignedBigInteger('evento_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('estadoinvitacion_id')->default(1);

            $table->foreign('organizador_id')->references('id')
                  ->on('organizadors')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('evento_id')->references('id')
                  ->on('eventos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('cliente_id')->references('id')
                  ->on('clientes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('estadoinvitacion_id')->references('id')
                  ->on('estadoinvitacions')
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
        Schema::dropIfExists('invitacions');
    }
};
