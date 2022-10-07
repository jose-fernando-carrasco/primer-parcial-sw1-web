<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Estado1 = new Estado();
        $Estado1->name = "Pendiente";
        $Estado1->save();

        $Estado2 = new Estado();
        $Estado2->name = "Aceptado";
        $Estado2->save();

        $Estado3 = new Estado();
        $Estado3->name = "Concluido";
        $Estado3->save();
    }
}
