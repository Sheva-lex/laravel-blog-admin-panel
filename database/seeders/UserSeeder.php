<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::updateOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Admin',
            'patronymic' => 'Adminovych',
            'surname' => 'Adminenko',
            'phone' => '+380971111111',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);

        User::updateOrCreate([
            'email' => 'manager@manager.com',
        ], [
            'name' => 'Manager',
            'patronymic' => 'Managerovych',
            'surname' => 'Managerenko',
            'phone' => '+380972222222',
            'password' => Hash::make('123456'),
            'role' => 'manager',
        ]);

        User::updateOrCreate([
            'email' => 'user@user.com',
        ], [
            'name' => 'User',
            'patronymic' => 'Userovych',
            'surname' => 'Userenko',
            'phone' => '+380973333333',
            'password' => Hash::make('123456'),
            'role' => 'user',
        ]);
    }

}
