<?php

namespace Database\Seeders;

use App\Models\Estadoevento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoeventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estadoevento1 = new Estadoevento();
        $estadoevento1->name = "No iniciado";
        $estadoevento1->save();

        $estadoevento2 = new Estadoevento();
        $estadoevento2->name = "En Curso";
        $estadoevento2->save();

        $estadoevento3 = new Estadoevento();
        $estadoevento3->name = "Finalizado";
        $estadoevento3->save();
    }
}
