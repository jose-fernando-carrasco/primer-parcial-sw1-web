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
        Schema::create('fotografos', function (Blueprint $table) {
            $table->id();
            $table->string('ci')->nullable();
            $table->text('tipo_trabajo')->nullable();
            $table->text('experiencias')->nullable();
            $table->text('equipos')->nullable();
            $table->string('fecha_naci')->nullable();
            $table->boolean('configurado')->default(false);
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('tipo_id')->default(1);//particular

            $table->foreign('user_id')->references('id')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('tipo_id')->references('id')
                  ->on('tipos')
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
        Schema::dropIfExists('fotografos');
    }
};
