<?php

namespace Database\Seeders;

use App\Models\Fotografo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FotografoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Idalia es Fotografo
        $fotografo1 = new Fotografo();
        $fotografo1->user_id = 2;
        $fotografo1->save();

    }
}
