<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::with('client')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['client_id' => 'required|exists:clients,id', 'name' => 'required']);
        return Project::create($validated);
    }

    public function show(Project $project)
    {
        return $project->load(['client', 'activities']);
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return $project;
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->noContent();
    }
}