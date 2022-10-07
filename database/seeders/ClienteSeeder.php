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

        $Cliente3 = new Cliente();
        $Cliente3->user_id = 5;
        $Cliente3->save();

        $Cliente4 = new Cliente();
        $Cliente4->user_id = 6;
        $Cliente4->save();

        $Cliente5 = new Cliente();
        $Cliente5->user_id = 7;
        $Cliente5->save();
        
    }
}
