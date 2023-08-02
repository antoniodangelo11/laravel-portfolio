<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    private $validations = [
        'title'             => 'required|string|max:50',
        'type_id'           => 'required|integer|exists:types,id',
        'user_id'           => 'required|integer|exists:users,id',
        'creation_date'     => 'required|date',
        'last_update'       => 'required|date',
        'collaborators'     => 'nullable|string|max:150',
        'description'       => 'string',
        'image'             => 'nullable|image|max:1024',
        'link_github'       => 'required|url|max:200',
        
        
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
        return view('admin.projects.create', compact('types'));
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
        if ($request->has('image')) {
            $imagePath = Storage::put('uploads', $data['image']);
            $newProject->image          = $imagePath;
        }
        $newProject->last_update     = $data['last_update'];
        $newProject->collaborators   = $data['collaborators'];
        $newProject->link_github     = $data['link_github'];
        $newProject->description     = $data['description'];
        $newProject->save();

        return redirect()->route('admin.projects.show', ['project' => $newProject]);
    }

    
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('admin.projects.show', compact('project'));
    }

    
    public function edit($slug)
    {
        $types = Type::all();
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    
    public function update(Request $request, $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $request->validate($this->validations, $this->validations_messages);
        $data = $request->all();

        if ($request->has('image')) {
            $imagePath = Storage::disk('public')->put('uploads', $data['image']);
            if ($project->image) {
                Storage::delete($project->image);
            }
            $project->image = $imagePath;
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
        // se ho il trashed lo inserisco nel harddelete
        
        $project->forceDelete();
        return to_route('admin.projects.trashed')->with('delete_success', $project);
    }
}
