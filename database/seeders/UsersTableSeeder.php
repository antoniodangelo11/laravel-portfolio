<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    
    public function run()
    {
        $users = [
            [
                "name"      => "Alessio Abbati",
                "email"     => "abbatialessio94@gmail.com",
                "password"  => Hash::make('mandrake117'),
                "image"     => "Alessio.png",
            ],
            [
                "name"      => "Antonio D'angelo",
                "email"     => "antonio.dangelo1190@gmail.com",
                "password"  => Hash::make('antoniodangelo1190'),
                "image"     => "Antonino.png",
            ],
            [
                "name"      => "Davide Farci",
                "email"     => "davide.farci9@gmail.com",
                "password"  => Hash::make('bobboi92'),
                "image"     => "Davide.png",
            ],
            [
                "name"      => "Paolo Falco",
                "email"     => "paolo.falcoapp@gmail.com",
                "password"  => Hash::make('paolo1996'),
                "image"     => "Paolo.png",
            ],
            [
                "name"      => "Simone Ricco",
                "email"     => "smnrcc0@gmail.com",
                "password"  => Hash::make('simo03'),
                "image"     => "Simone.png",
            ],
            [
                "name"      => "Andrea Serra",
                "email"     => "serra.andrea1997@gmail.com",
                "password"  => Hash::make('andreaserra1997'),
                "image"     => "Andrea.png",
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
