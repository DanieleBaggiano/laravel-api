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
    public function index()
    {
        $projects = Project::all();
        return response()->json([
            'results' => $projects,
            'success' => 1,
        ]);
    }
}
