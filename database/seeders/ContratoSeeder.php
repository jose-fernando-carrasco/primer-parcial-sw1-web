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
        $Contrato1->detalle = "Estimado Sr. me comunico con usted para solicitar un servicio de fotografo para el matrimonio del joven Jose con la señorita mia";
        $Contrato1->clausulaDelEvento = "No distraerse durante la entrada de los novios";
        $Contrato1->politicaCancelacion = "Para que se le cancele debera cumplir con sacar las mejores fotos a la pareja";
        $Contrato1->plazoDeEntrega = "Se le efectuara el pago 1 dia despues de recibir las fotos";
        $Contrato1->tipopago_id = 1;
        $Contrato1->evento_id = 1;
        $Contrato1->fotografo_id = 1;
        $Contrato1->organizador_id = 1;
        $Contrato1->save();

        /*
        $Contrato2 = new Contrato();
        $Contrato2->detalle = "Estimado Sr. me comunico con usted para solicitar un servicio de fotografo para el matrimonio del joven Jose con la señorita mia";
        $Contrato2->clausulaDelEvetento = "No distraerse durante la entrada de los novios";
        $Contrato2->politicaCancelacion = "Para que se le cancele debera cumplir con sacar las mejores fotos a la pareja";
        $Contrato2->plazoDeEntrega = "Se le efectuara el pago 1 dia despues de recibir las fotos";
        $Contrato2->tipopago_id = 1;
        $Contrato2->evento_id = 1;
        $Contrato2->fotografo_id = 1;
        $Contrato2->organizador_id = 1;
        $Contrato2->save();*/
    }
}
