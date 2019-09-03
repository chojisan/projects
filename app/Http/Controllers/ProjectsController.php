<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Arr;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $projects = Project::with('user')->paginate(10);

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Project $project)
    {
        $validated = $this->validation();

        Project::create(Arr::add($validated, 'user_id', auth()->id()));

        return redirect()
                ->route('projects.index')
                ->with('success', 'Project created successfully!');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project) 
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $validated = $this->validation();

        $project->update($validated);

        return redirect()
                ->route('projects.index')
                ->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
                ->route('projects.index')
                ->with('success', 'Project deleted successfully!');
    }

    public function validation()
    {
        return request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
    }
}