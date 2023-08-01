<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProjectAlessio;
use Illuminate\Http\Request;

class ProjectAlessioController extends Controller
{
    
    public function index()
    {
        $project = ProjectAlessio::with('type')->paginate(3);

        return response()->json([
            'success' => true,
            'results'    => $project,
        ]);
    }

    

    

    
    public function show($slug)
    {
        $project = ProjectAlessio::where('slug', $slug)->first();
        return response()->json([
            'success' => $project ? true : false,
            'results'    => $project,
        ]);
    }

}
