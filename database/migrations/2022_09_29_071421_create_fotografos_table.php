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
            $table->string('fecha_naci')->nullable();
            $table->string('tipo_trabajo')->nullable();
            $table->string('experiencia')->nullable();
            $table->string('equipo')->nullable();
            $table->unsignedBigInteger('user_id')->unique();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
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
