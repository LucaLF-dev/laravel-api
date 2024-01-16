<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {

        dd($slug);

        $results = Project::all();
        //$results = Project::with('type',)->paginate(5);



        return response()->json([
            'results' => $results,
            'success' => true
        ]);
    }

    public function show(Request $request, $slug)
    {
        dd($slug);
    }
}
