<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Legendary',
        	'phone_no' => 2,
        	'state_of_origin' => 'Akwa Ibom',
        	'email' => 'excellentloaded@gmail.com',
        	'password' => bcrypt(123456),
        ]);
    }
}
