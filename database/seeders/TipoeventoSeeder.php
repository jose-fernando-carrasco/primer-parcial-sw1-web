<?php

namespace Database\Seeders;

use App\Models\Tipoevento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoeventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Tipoevento1 = new Tipoevento();
        $Tipoevento1->tipodeevento = "Matrimonio";
        $Tipoevento1->save();

        $Tipoevento2 = new Tipoevento();
        $Tipoevento2->tipodeevento = "Promocion Kinder";
        $Tipoevento2->save();

        $Tipoevento3 = new Tipoevento();
        $Tipoevento3->tipodeevento = "Graduacion Bachiller";
        $Tipoevento3->save();

        $Tipoevento4 = new Tipoevento();
        $Tipoevento4->tipodeevento = "Aniversario de Bodas";
        $Tipoevento4->save();

    }
}
