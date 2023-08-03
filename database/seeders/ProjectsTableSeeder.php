<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsTableSeeder extends Seeder
{
    
    public function run()
    {
        foreach (config('projects') as $objProject) {

            $slug = Project::slugger($objProject['title']);

            $project = Project::create([
                'type_id'           => $objProject['type_id'],
                'user_id'           => $objProject['user_id'],
                'title'             => $objProject['title'],
                'slug'              => $slug,
                'creation_date'     => $objProject['creation_date'],
                'last_update'       => $objProject['last_update'],
                'collaborators'     => $objProject['collaborators'],
                'description'       => $objProject['description'],
                'image1'            => $objProject['image1'],
                'image2'            => $objProject['image2'],
                'image3'            => $objProject['image3'],
                'image4'            => $objProject['image4'],
                'image5'            => $objProject['image5'],
                // 'video'             => $objProject['video'],
                'link_github'       => $objProject['link_github'],
                
            ]);

            $project->technologies()->sync($objProject['technologies']);
        }
    }
}
