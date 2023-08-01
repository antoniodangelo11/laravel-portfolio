<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProjectPaolo;
use Illuminate\Http\Request;

class ProjectAntonioController extends Controller
{
    
    public function index()
    {
        $project = ProjectPaolo::with('type')->paginate(3);

        return response()->json([
            'success' => true,
            'results'    => $project,
        ]);
    }

    
    public function show($slug)
    {
        $project = ProjectPaolo::where('slug', $slug)->first();
        return response()->json([
            'success' => $project ? true : false,
            'results'    => $project,
        ]);
    }

}