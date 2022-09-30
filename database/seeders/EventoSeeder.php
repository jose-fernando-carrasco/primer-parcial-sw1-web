<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Evento1 = new Evento();
        $Evento1->titulo = "Casamiento Jose y Mia";
        $Evento1->detalle = "Estimado Sr. me comunico con usted para solicitar un servicio de fotografo para el matrimonio del joven Jose con la señorita mia";
        $Evento1->ubicacion = "Av. San Aurelio / Calle 13 / Nro 159";
        $Evento1->cantpersonas = "100";
        $Evento1->save();

    }
}