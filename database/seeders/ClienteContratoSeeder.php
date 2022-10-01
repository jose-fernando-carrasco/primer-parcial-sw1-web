<?php

namespace Database\Seeders;

use App\Models\Cliente_contrato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ClienteContrato1 = new Cliente_contrato();
        $ClienteContrato1->cliente_id = 1;
        $ClienteContrato1->contrato_id = 1;
        $ClienteContrato1->save();

    }
}
