<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProjectAndrea;
use Illuminate\Http\Request;

class ProjectAndreaController extends Controller
{
    
    public function index()
    {
        $project = ProjectAndrea::with('type')->paginate(3);

        return response()->json([
            'success' => true,
            'results'    => $project,
        ]);
    }

    
    public function show($slug)
    {
        $project = ProjectAndrea::where('slug', $slug)->first();
        return response()->json([
            'success' => $project ? true : false,
            'results'    => $project,
        ]);
    }

}