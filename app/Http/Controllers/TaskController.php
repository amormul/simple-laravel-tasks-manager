<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Project $project)
    {
        $tasks = $project->tasks;
        return view('tasks.index', compact('project', 'tasks'));
    }

    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $task = new Task($request->all());
        $project->tasks()->save($task);
        return redirect()->route('projects.tasks.index', $project);
    }

    public function show(Project $project, Task $task)
    {
        return view('tasks.show', compact('project', 'task'));
    }

    public function edit(Project $project, Task $task)
    {
        return view('tasks.edit', compact('project', 'task'));
    }

    public function update(Request $request, Project $project, Task $task)
    {
        $data = $request->all();
        if (isset($data['done'])) {
            $data['done'] = $data['done'] === 'on' ? 1 : 0;
        }
        $task->update($data);
        return redirect()->route('projects.tasks.index', $project);
    }

    public function destroy(Project $project, Task $task)
    {
        $task->delete();
        return redirect()->route('projects.tasks.index', $project);
    }

    public function details(Project $project, Task $task)
    {
        return view('tasks.details', compact('project', 'task'));
    }
}
