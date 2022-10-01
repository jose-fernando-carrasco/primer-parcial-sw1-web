<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //marco es cliente
        $Cliente1 = new Cliente();
        $Cliente1->user_id = 3;
        $Cliente1->save();

        $Cliente2 = new Cliente();
        $Cliente2->user_id = 4;
        $Cliente2->save();
        
    }
}
