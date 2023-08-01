<?php

namespace Database\Seeders;

use App\Models\ProjectAntonio;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsAntonioTableSeeder extends Seeder
{
    
    public function run()
    {
        foreach (config('projectsAntonio') as $objProject) {

            $slug = ProjectAntonio::slugger($objProject['title']);

            $project = ProjectAntonio::create([
                'type_id' => $objProject['type_id'],
                'title' => $objProject['title'],
                'slug'  => $slug,
                'author' => $objProject['author'],
                'creation_date' => $objProject['creation_date'],
                'last_update' => $objProject['last_update'],
                'collaborators' => $objProject['collaborators'],
                'description' => $objProject['description'],
                'image'       => $objProject['image'],
                'link_github' => $objProject['link_github'],
                
            ]);
        }
    }
}