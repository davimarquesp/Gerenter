<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('user_id', auth()->id())
            ->orderBy('start_date', 'desc')
            ->paginate(10);

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'description' => ['nullable', 'string'],
            'technologies' => ['nullable', 'string'],
        ]);

        $data['user_id'] = auth()->id();

        Project::create($data);

        return redirect()->route('projects.index')->with('success', 'Projeto cadastrado!');
    }

    public function edit(Project $project)
    {
        abort_unless($project->user_id === auth()->id(), 403);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        abort_unless($project->user_id === auth()->id(), 403);

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'description' => ['nullable', 'string'],
            'technologies' => ['nullable', 'string'],
        ]);

        $project->update($data);

        return redirect()->route('projects.index')->with('success', 'Projeto atualizado!');
    }

    public function destroy(Project $project)
    {
        abort_unless($project->user_id === auth()->id(), 403);
        $project->delete();

        return back()->with('success', 'Projeto excluído!');
    }
}