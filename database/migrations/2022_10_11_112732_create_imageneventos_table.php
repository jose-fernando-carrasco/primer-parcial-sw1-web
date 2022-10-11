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
        Schema::create('imageneventos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('url');
            $table->unsignedBigInteger('evento_id');
            $table->unsignedBigInteger('fotografo_id');

            $table->foreign('evento_id')->references('id')
                  ->on('eventos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('fotografo_id')->references('id')
                  ->on('fotografos')
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
        Schema::dropIfExists('imageneventos');
    }
};
