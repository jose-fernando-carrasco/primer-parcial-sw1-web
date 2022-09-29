<?php

namespace Database\Seeders;

use App\Models\Telefono;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TelefonoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Telefonos de Fernando
        $Telefono1 = new Telefono();
        $Telefono1->numero = "71029903";
        $Telefono1->user_id = 1;
        $Telefono1->save();

        $Telefono2 = new Telefono();
        $Telefono2->numero = "74587643";
        $Telefono2->user_id = 1;
        $Telefono2->save();

        //Telefono de idalia
        $Telefono3 = new Telefono();
        $Telefono3->numero = "76589972";
        $Telefono3->user_id = 2;
        $Telefono3->save();

        //Telefono de marco
        $Telefono4 = new Telefono();
        $Telefono4->numero = "74995765";
        $Telefono4->user_id = 3;
        $Telefono4->save();

    }
}
