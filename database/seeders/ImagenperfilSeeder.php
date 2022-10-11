<?php

namespace Database\Seeders;

use App\Models\Imagenperfil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagenperfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Imagenperfil::create([
            'name' => 'foto-1',
            'url' => 'https://mycontenedor23.s3.amazonaws.com/Perfiles/Jose/jose-1.jpeg',
            'user_id' => 1
        ]); 

        Imagenperfil::create([
            'name' => 'foto-2',
            'url' => 'https://mycontenedor23.s3.amazonaws.com/Perfiles/Jose/jose-2.jpeg',
            'user_id' => 1
        ]);

        Imagenperfil::create([
            'name' => 'foto-3',
            'url' => 'https://mycontenedor23.s3.amazonaws.com/Perfiles/Jose/jose-3.jpeg',
            'user_id' => 1
        ]);
    }
}
