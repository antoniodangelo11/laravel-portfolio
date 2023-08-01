<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            Project::create([
                'title' => $faker->words(1, true),
                'author' => $faker->firstName(),
                'creation_date' => $faker->date(),
                'last_update' => $faker->date(),
                'collaborators' => null,
                'description' => $faker->sentence(),
                'image' => null,
                'link_github' => $faker->url(),
                'user_id' => '1',
            ]);
        }
    }
}
