<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(10);

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Project $project)
    {
        $validated = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Project::create($validated);

        return redirect('/projects');
    }

    public function show()
    {

    }

    public function edit() 
    {
        return view('projects.edit');
    }

    public function update()
    {

    }

    public function destroy()
    {

    }


}