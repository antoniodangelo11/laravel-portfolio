<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    private $validations = [
        'title'              => 'required|string|max:50',
        'type_id'            => 'required|integer|exists:types,id',
        'user_id'            => 'required|integer|exists:users,id',
        'creation_date'      => 'required|date',
        'last_update'        => 'required|date',
        'collaborators'      => 'nullable|string|max:150',
        'description'        => 'string',
        'image1'             => 'nullable|image|max:1024',
        'image2'             => 'nullable|image|max:1024',
        'image3'             => 'nullable|image|max:1024',
        'image4'             => 'nullable|image|max:1024',
        'image5'             => 'nullable|image|max:1024',
        'video'              => 'nullable|file|mimes:webm,mp4,avi,flv|max:10240',
        'link_github'        => 'required|url|max:200',
        'technologies'       => 'nullable|array',
        'technologies. *'    => 'integer|exists:technologies,id',
        
    ];

    private $validations_messages = [
        'required'      => 'il campo :attribute è obbligatorio',
        'max'           => 'il campo :attribute deve avere almeno :max caratteri',
        'url'           => 'il campo deve essere un url valido',
        'exists'        => 'Valore non valido',
    ];
    
    public function index()
    {
        $projects = Project::paginate(6);
        return view('admin.projects.index', compact('projects'));
    }

    
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    
    public function store(Request $request)
    {
        $request->validate($this->validations, $this->validations_messages);
        $data = $request->all();
        
        // Salvare i dati nel database
        $newProject = new Project();
        $newProject->title           = $data['title'];
        $newProject->slug            = Project::slugger($data['title']);
        $newProject->type_id         = $data['type_id'];
        $newProject->user_id         = $data['user_id'];
        $newProject->creation_date   = $data['creation_date'];
        if ($request->has('image1')) {
            $imagePath = Storage::put('uploads', $data['image1']);
            $newProject->image1          = $imagePath;
        }
        if ($request->has('image2')) {
            $imagePath = Storage::put('uploads', $data['image2']);
            $newProject->image2          = $imagePath;
        }
        if ($request->has('image3')) {
            $imagePath = Storage::put('uploads', $data['image3']);
            $newProject->image3          = $imagePath;
        }
        if ($request->has('image4')) {
            $imagePath = Storage::put('uploads', $data['image4']);
            $newProject->image4          = $imagePath;
        }
        if ($request->has('image5')) {
            $imagePath = Storage::put('uploads', $data['image5']);
            $newProject->image5          = $imagePath;
        }
        if ($request->has('video')) {
            $videoPath = Storage::put('uploads', $data['video']);
            $newProject->video          = $videoPath;
        }
        $newProject->last_update     = $data['last_update'];
        $newProject->collaborators   = $data['collaborators'];
        $newProject->link_github     = $data['link_github'];
        $newProject->description     = $data['description'];
        $newProject->save();

        $newProject->technologies()->sync($data['technologies'] ?? []);

        return redirect()->route('admin.projects.show', ['project' => $newProject]);
    }

    
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('admin.projects.show', compact('project'));
    }

    
    public function edit($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $types = Type::all();
        $technologies = Technology::all();
        
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    
    public function update(Request $request, $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $request->validate($this->validations, $this->validations_messages);
        $data = $request->all();

        if ($request->has('image1')) {
            $imagePath = Storage::disk('public')->put('uploads', $data['image1']);
            if ($project->image1) {
                Storage::delete($project->image1);
            }
            $project->image1 = $imagePath;
        }
        if ($request->has('image2')) {
            $imagePath = Storage::disk('public')->put('uploads', $data['image2']);
            if ($project->image2) {
                Storage::delete($project->image2);
            }
            $project->image2 = $imagePath;
        }
        if ($request->has('image3')) {
            $imagePath = Storage::disk('public')->put('uploads', $data['image3']);
            if ($project->image3) {
                Storage::delete($project->image3);
            }
            $project->image3 = $imagePath;
        }
        if ($request->has('image4')) {
            $imagePath = Storage::disk('public')->put('uploads', $data['image4']);
            if ($project->image4) {
                Storage::delete($project->image4);
            }
            $project->image4 = $imagePath;
        }
        if ($request->has('image5')) {
            $imagePath = Storage::disk('public')->put('uploads', $data['image5']);
            if ($project->image5) {
                Storage::delete($project->image5);
            }
            $project->image5 = $imagePath;
        }
        if ($request->has('video')) {
            $videoPath = Storage::disk('public')->put('uploads', $data['video']);
            if ($project->video) {
                Storage::delete($project->video);
            }
            $project->video = $videoPath;
        }

        $project->title             = $data['title'];
        $project->type_id           = $data['type_id'];
        $project->user_id           = $data['user_id'];
        $project->creation_date     = $data['creation_date'];
        $project->last_update       = $data['last_update'];
        $project->collaborators     = $data['collaborators'];
        $project->link_github       = $data['link_github'];
        $project->description       = $data['description'];
        $project->update();

        $project->technologies()->sync($data['technologies'] ?? []);

        return redirect()->route('admin.projects.show', ['project' => $project]);
    }

    
    public function destroy($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        $project->delete();

        return to_route('admin.projects.index')->with('delete_success', $project);
    }

    public function restore($slug)
    {
        $project = Project::find($slug);
        Project::withTrashed()->where('slug', $slug)->restore();
        $project = Project::where('slug', $slug)->firstOrFail();

        

        return to_route('admin.projects.trashed')->with('restore_success', $project);
    }

    public function cancel($slug)
    {
        $project = Project::find($slug);
        Project::withTrashed()->where('slug', $slug)->restore();
        $project = Project::where('slug', $slug)->firstOrFail();

        

        return to_route('admin.projects.index')->with('cancel_success', $project);
    }

    public function trashed()
    {
        $trashedProjects = Project::onlyTrashed()->paginate(6);

        return view('admin.projects.trashed', compact('trashedProjects'));
    }

    public function harddelete($slug)
    {
        $project = Project::withTrashed()->where('slug', $slug)->first();
        
        if ($project->file) {
            Storage::delete($project->file);
        }

        $project->technologies()->detach();
        $project->forceDelete();
        return to_route('admin.projects.trashed')->with('delete_success', $project);
    }
}
