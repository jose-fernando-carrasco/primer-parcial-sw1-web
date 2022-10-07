<?php

namespace Database\Seeders;

use App\Models\Invitacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Invitacion1 = new Invitacion();
        $Invitacion1->organizador_id = 1;
        $Invitacion1->evento_id = 1;
        $Invitacion1->cliente_id = 2;
        $Invitacion1->save();

    }
}
