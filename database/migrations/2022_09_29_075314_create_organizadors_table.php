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
        Schema::create('organizadors', function (Blueprint $table) {
            $table->id();
            $table->string('ci')->nullable();
            $table->text('objetivos')->nullable();
            $table->text('estrategias')->nullable();
            $table->text('experiencias')->nullable();
            $table->text('tecnologias')->nullable();
            $table->string('fecha_naci')->nullable();
            $table->unsignedBigInteger('user_id')->unique();

            $table->foreign('user_id')->references('id')
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
        Schema::dropIfExists('organizadors');
    }
};
