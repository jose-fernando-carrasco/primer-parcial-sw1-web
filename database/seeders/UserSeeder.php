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

        $user5 = new User();
        $user5->name = "chimuelo";
        $user5->email = "chi@gmail.com";
        $user5->password = bcrypt("123");
        $user5->tipoCuenta = 3;
        $user5->save();


        $user6 = new User();
        $user6->name = "panfilo";
        $user6->email = "pan@gmail.com";
        $user6->password = bcrypt("123");
        $user6->tipoCuenta = 3;
        $user6->save();

        $user7 = new User();
        $user7->name = "macario";
        $user7->email = "mac@gmail.com";
        $user7->password = bcrypt("123");
        $user7->tipoCuenta = 3;
        $user7->save();

    }
}
