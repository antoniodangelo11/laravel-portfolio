<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name"      => "Alessio",
                "email"     => "abbatialessio94@gmail.com",
                "password"  => Hash::make('mandrake117'),
            ],
            [
                "name"      => "Antonio",
                "email"     => "antonio.dangelo1190@gmail.com",
                "password"  => Hash::make('antoniodangelo1190'),
            ],
            [
                "name"      => "Davide",
                "email"     => "davide.farci9@gmail.com",
                "password"  => Hash::make('bobboi92'),
            ],
            [
                "name"      => "Paolo",
                "email"     => "paolo.falcoapp@gmail.com",
                "password"  => Hash::make('paolo1996'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
    
}