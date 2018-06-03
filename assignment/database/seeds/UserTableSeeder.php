<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'DMP Dangalla',
            'email' => 'manjuladangalla@gmail.com',
            'password'=> Hash::make("manjula@123"),
            'user_type'=> 'Admin',
            'remember_token' => str_random(10)
        ]);

        User::create([
            'name' => 'Normal User',
            'email' => 'user@user.com',
            'password'=> Hash::make("user@123"),
            'user_type'=> 'User',
            'remember_token' => str_random(10)
        ]);
    }
}
