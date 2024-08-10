<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'username' => "Super Admin",
                'role_id' => 1,
                'email' => "superadmin@gmail.com",
                'password' => Hash::make(123)
            ],
            [
                'username' => "Admin",
                'role_id' => 2,
                'email' => "admin@gmail.com",
                'password' => Hash::make(123)
            ]
        ]);
    }
}
