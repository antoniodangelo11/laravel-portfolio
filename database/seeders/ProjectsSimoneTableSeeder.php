<?php

namespace Database\Seeders;

use App\Models\ProjectSimone;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsSimoneTableSeeder extends Seeder
{
    
    public function run()
    {
        foreach (config('projectsSimone') as $objProject) {

            $slug = ProjectSimone::slugger($objProject['title']);

            $project = ProjectSimone::create([
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
