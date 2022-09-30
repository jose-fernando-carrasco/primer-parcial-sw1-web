<?php

namespace Database\Seeders;

use App\Models\Tipopago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipopagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipopago1 = new Tipopago();
        $tipopago1->tipodepago = "Fisico";
        $tipopago1->save();

        $tipopago2 = new Tipopago();
        $tipopago2->tipodepago = "Tarjeta de debito";
        $tipopago2->save();

    }
}
