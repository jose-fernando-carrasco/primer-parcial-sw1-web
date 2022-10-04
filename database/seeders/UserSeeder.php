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
        $user1 = new User();
        $user1->name = "fernando";
        $user1->email = "fer@gmail.com";
        $user1->password = bcrypt("123");
        $user1->tipoCuenta = 1;
        $user1->save();

        //Fotografo
        $user2 = new User();
        $user2->name = "idalia";
        $user2->email = "ida@gmail.com";
        $user2->password = bcrypt("123");
        $user2->tipoCuenta = 2;
        $user2->save();

        //Cliente
        $user3 = new User();
        $user3->name = "marco";
        $user3->email = "marc@gmail.com";
        $user3->password = bcrypt("123");
        $user3->tipoCuenta = 3;
        $user3->save();

        $user4 = new User();
        $user4->name = "pepe";
        $user4->email = "pepe@gmail.com";
        $user4->password = bcrypt("123");
        $user4->tipoCuenta = 3;
        $user4->save();

    }
}
