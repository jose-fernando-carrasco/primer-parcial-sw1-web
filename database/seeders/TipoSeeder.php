<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo1 = new Tipo();
        $tipo1->tipo_fotografo = "Particular";
        $tipo1->save();

        $tipo2 = new Tipo();
        $tipo2->tipo_fotografo = "Estudio";
        $tipo2->save();

    }
}
