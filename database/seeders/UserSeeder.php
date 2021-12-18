<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'user_name' => 'admin',
            'password' => \Hash::make('password'),
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        User::create([
            'name' => 'Client1',
            'user_name' => 'client1',
            'password' => \Hash::make('password'),
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        User::create([
            'name' => 'Client2',
            'user_name' => 'client2',
            'password' => \Hash::make('password'),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
