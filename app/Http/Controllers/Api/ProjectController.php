<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 1);
        $projects = Project::paginate($perPage);

        return response()->json([
            'results' => $projects->items(),
            'pagination' => [
                'current_page' => $projects->currentPage(),
                'total_pages' => $projects->lastPage(),
                'per_page' => $projects->perPage(),
                'total' => $projects->total(),
            ],
            'success' => 1,
        ]);
    }
    
    public function show($id)
    {
        $project = Project::find($id);
        if ($project) {
            return response()->json($project);
        } else {
            return response()->json(['error' => 'Project not found'], 404);
        }
    }
}
