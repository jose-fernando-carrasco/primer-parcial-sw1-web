<?php

namespace Database\Seeders;

use App\Models\Estadoinvitacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoinvitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estadoinvitacion1 = new Estadoinvitacion();
        $estadoinvitacion1->name = "Pendiente";
        $estadoinvitacion1->save();

        $estadoinvitacion2 = new Estadoinvitacion();
        $estadoinvitacion2->name = "Aceptado";
        $estadoinvitacion2->save();

        $estadoinvitacion3 = new Estadoinvitacion();
        $estadoinvitacion3->name = "Rechazado";
        $estadoinvitacion3->save();

    }
}
