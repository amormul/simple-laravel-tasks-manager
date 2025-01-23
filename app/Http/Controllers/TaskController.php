<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Project $project)
    {
        $tasks = $project->tasks()->where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks', 'project'));
    }

    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'priority' => 'required|integer',
        ]);

        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'priority' => $request->priority,
            'user_id' => auth()->id(),
            'project_id' => $project->id,
        ]);

        return redirect()->route('projects.show', $project)->with('success', 'Task created successfully.');
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
        $request->validate([
            'name' => 'required|max:255',
            'priority' => 'nullable|integer',
            'done' => 'nullable|boolean',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
            'user_id' => 'nullable|integer',
        ]);

        $task->update($request->all());
        return redirect()->route('projects.show', $project)->with('success', 'Task updated successfully.');
    }

    public function details(Project $project, Task $task)
    {
        return response()->json($task);
    }

    public function destroy($projectId, $taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->delete();

        return redirect()->route('projects.show', $projectId)->with('success', 'Task deleted successfully.');
    }
}
