<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->query('user_id');
        $query = Project::with('type', 'user', 'technologies');

        if($user_id) {
            $query = $query->where('user_id', $user_id);
        }

        $project = $query->paginate(6);

        return response()->json([
            'success' => true,
            'results'    => $project,
        ]);
    }

    

    

    
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->first();
        return response()->json([
            'success' => $project ? true : false,
            'results'    => $project,
        ]);
    }
}
