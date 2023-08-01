<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call([
            TypesTableSeeder::class,
            UsersTableSeeder::class,
            ProjectsAlessioTableSeeder::class,
            ProjectsAntonioTableSeeder::class,
            ProjectsAndreaTableSeeder::class,
            ProjectsDavideTableSeeder::class,
            ProjectsPaoloTableSeeder::class,
            ProjectsSimoneTableSeeder::class,
        ]);
    }
}
