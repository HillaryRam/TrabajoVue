<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $fieldsLabels = Project::fieldLabels();
        return Inertia::render('Projects/Index', [
            'rows' => $projects,
            'fields' => $fieldsLabels,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fieldsLabels = Project::fieldLabels();
        return Inertia::render('Projects/Create', [
            'fieldsLabels' => $fieldsLabels,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->validated());
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $fieldsLabels = Project::fieldLabels();
        return Inertia::render('Projects/Show', [
            'project' => $project,
            'fieldsLabels' => $fieldsLabels,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $fieldsLabels = Project::fieldLabels();
        return Inertia::render('Projects/Edit', [
            'project' => $project,
            'fieldsLabels' => $fieldsLabels,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
}
