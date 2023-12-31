<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
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
        $user = User::create([
            'name' => 'Admin',
            'login' => 'Admin',
            'email' => 'example@gmail.com',
            'password' => Hash::make('123456789'),
            'sex' => 'мужской'
        ]);

        $user->assignRole('admin');
        //$user->assignRole('expert');

        $another = User::create([
            'name' => 'TestUser',
            'login' => 'Test',
            'email' => 'testuser@gmail.ru',
            'password' => Hash::make('123456789'),
            'sex' => 'не указан'
        ]);

        //$another->assignRole('expert');
    }
}
