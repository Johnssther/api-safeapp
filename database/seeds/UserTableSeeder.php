<?php

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Seeder;
use App\Models\User;

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
            'user_name' => 'Administrador',
            'user_email' => 'admin@gmail.com',
            'user_phone' => 1234567890,
            'user_active' => 1,
            'username' => 'admin',
            'password' => Crypt::encrypt('admin')
        ]);
        User::create([
            'user_name' => 'Joe',
            'user_email' => 'joe@gmail.com',
            'user_phone' => 1234567890,
            'user_active' => 1,
            'username' => 'joe',
            'password' => Crypt::encrypt('joe')
        ]);
    }
}