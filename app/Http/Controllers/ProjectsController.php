<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Arr;
use DataTables;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        //$projects = Project::with('user')->paginate(10);

        if (request()->ajax()) {
            $projects = Project::with('user')->get();

            return DataTables::of($projects)
                    ->addColumn('show', function ($project) {
                        return '<a href="'.route('projects.show', $project->id).'" class="label label-info"><i class="fa fa-eye"></i> Show</a>';
                    })
                    ->addColumn('edit', function ($project) {
                        return '<a href="'.route('projects.edit', $project->id).'" class="label label-warning"><i class="fa fa-edit"></i> Edit</a>';
                    })
                    ->addColumn('delete', function ($project) {
                        return '<a href="#" class="label label-danger delete-btn" data-id="'.$project->id.'" data-title="'.$project->title.'" data-href="'.route('projects.destroy', $project->id).'" data-toggle="modal" data-target="#modalDefault"><i class="fa fa-trash"></i> Delete</a>';
                    })
                    ->rawColumns(['show', 'edit', 'delete'])
                    ->make(true);
        }

        return view('projects.index');
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

        if (request()->json()) {
            return response()->json(['success', 'Project deleted successfully!']);
        }

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