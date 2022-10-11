<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Organizador
        User::create([
            'name' => 'Jose Fernando',
            'email' => 'fer@gmail.com',
            'password' => bcrypt('123'),
            'tipoCuenta' => 1
        ])->syncRoles(['Organizador','Admin']);

        //Fotografo
        User::create([
            'name' => 'Idalia Carrasco',
            'email' => 'ida@gmail.com',
            'password' => bcrypt('123'),
            'tipoCuenta' => 2
        ])->assignRole('Fotografo');

        //Cliente
        User::create([
            'name' => 'Marco Baltazar',
            'email' => 'marc@gmail.com',
            'password' => bcrypt('123'),
            'tipoCuenta' => 3,
        ])->assignRole('Cliente');

        User::create([
            'name' => 'Pepe Lepu',
            'email' => 'pepe@gmail.com',
            'password' => bcrypt('123'),
            'tipoCuenta' => 3,
        ])->assignRole('Cliente');

        User::create([
            'name' => 'Pana Chimuelo',
            'email' => 'chi@gmail.com',
            'password' => bcrypt('123'),
            'tipoCuenta' => 3,
        ])->assignRole('Cliente');


        User::create([
            'name' => 'Panfilo Ayala',
            'email' => 'pan@gmail.com',
            'password' => bcrypt('123'),
            'tipoCuenta' => 3,
        ])->assignRole('Cliente');

        User::create([
            'name' => 'Macario Beltran',
            'email' => 'mac@gmail.com',
            'password' => bcrypt('123'),
            'tipoCuenta' => 3,
        ])->assignRole('Cliente');

        //Fotografo
        User::create([
            'name' => 'Julio Iglesia',
            'email' => 'jul@gmail.com',
            'password' => bcrypt('123'),
            'tipoCuenta' => 2,
        ])->assignRole('Fotografo');

    }
}
