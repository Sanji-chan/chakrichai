<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        $users = [
            [
               'name'=>'Admin',
               'email'=>'admin@chakrichai.com',
               'email_verified_at' => '2023-07-05 14:28:43',
               'role'=> 0,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Buyer',
               'email'=>'buyer@chakrichai.com',
               'email_verified_at' => '2023-07-05 14:28:43',
               'role'=> 1,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Seller',
               'email'=>'seller@chakrichai.com',
               'email_verified_at' => '2023-07-05 14:28:43',
               'role'=> 2,
               'password'=> bcrypt('123456'),
            ],
            
        ];
    
        foreach ($users as $key => $user) 
        {
            User::create($user);
        }
    }
}
