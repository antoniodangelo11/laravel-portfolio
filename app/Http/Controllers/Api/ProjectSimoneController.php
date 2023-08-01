<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProjectSimone;
use Illuminate\Http\Request;

class ProjectAntonioController extends Controller
{
    
    public function index()
    {
        $project = ProjectSimone::with('type')->paginate(3);

        return response()->json([
            'success' => true,
            'results'    => $project,
        ]);
    }

    
    public function show($slug)
    {
        $project = ProjectSimone::where('slug', $slug)->first();
        return response()->json([
            'success' => $project ? true : false,
            'results'    => $project,
        ]);
    }

}