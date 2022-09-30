<?php

namespace Database\Seeders;

use App\Models\Contrato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Contrato1 = new Contrato();
        $Contrato1->clausulaDelEvetento = "No distraerse durante la entrada de los novios";
        $Contrato1->politicaCancelacion = "Para que se le cancele debera cumplir con sacar las mejores fotos a la pareja";
        $Contrato1->plazoDeEntrega = "Se le efectuara el pago 1 dia despues de recibir las fotos";
        $Contrato1->tipopago_id = 1;
        $Contrato1->evento_id = 1;
        $Contrato1->save();

        /*
        $table->string('titulo');
            $table->text('detalle');
            $table->text('clausulaDelEvetento');
            $table->text('politicaCancelacion');
            $table->text('plazoDeEntrega');
            $table->unsignedBigInteger('tipopago_id');*/
    }
}
