<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function __construct()
    {
        $rules = [
        'name' => 'nullable|string',
        'email' => 'nullable|email',
        'phone' => 'nullable|numeric',
        'mobile' => 'nullable|numeric',
        'site_type_id' => 'nullable|integer'
    ];
    }

    public function index()
    {
        $tasks = auth()->user()->tasks;
        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task)
    {
        if (Auth::id() !== (int)$task->user_id) {
            return redirect(route('tasks'));
        }
        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store()
    {
        request()->validate([
            'task_name' => 'required|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        $name = request('task_name');
        $done = request('done') === 'on';
        $priority = request('priority') === null ? 0 : request('priority');
        $description = request('description');
        $deadline = request('deadline');

        $task = Task::create([
            'name' => $name,
            'priority' => $priority,
            'done' => $done,
            'description' => $description,
            'deadline' => $deadline,
            'user_id' => auth()->user()->id,
        ]);

        return redirect(route('task', $task->id));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Task $task)
    {
        request()->validate([
            'task_name' => 'required|max:255',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        $name = request('task_name');
        $done = request('done') === 'on';
        $priority = request('priority') === null ? 0 : request('priority');
        $description = request('description');
        $deadline = request('deadline');

        $task->update([
            'name' => $name,
            'priority' => $priority,
            'done' => $done,
            'description' => $description,
            'deadline' => $deadline,
        ]);

        return redirect(route('task', $task->id));
    }

    public function delete(Task $task)
    {
        $task->delete();
        return redirect(route('tasks'));
    }
}
