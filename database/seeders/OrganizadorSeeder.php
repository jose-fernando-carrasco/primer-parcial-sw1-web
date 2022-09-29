<?php

namespace Database\Seeders;

use App\Models\Organizador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //fernando es Organizador
        $Organizador1 = new Organizador();
        $Organizador1->user_id = 1;
        $Organizador1->save();
        
    }
}
