@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4" style="background: rgba(40, 40, 60, 0.95); border-radius: 15px;">
                    <div class="card-header text-white text-center fs-4" style="background: linear-gradient(45deg, #6a11cb, #2575fc); font-weight: bold;">
                        {{ $project->name }}
                    </div>
                    <div class="card-body text-light">
                        <p>{{ $project->description }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="background: rgba(40, 40, 60, 0.95); border-radius: 15px;">
                    <div class="card-header text-white text-center fs-4" style="background: linear-gradient(45deg, #6a11cb, #2575fc); font-weight: bold;">
                        Tasks
                    </div>
                    <div class="card-body text-light">
                        <a href="{{ route('projects.tasks.create', $project) }}" class="btn btn-success mb-3">Create Task</a>
                        @if($tasks->isNotEmpty())
                            <ul class="list-group">
                                @foreach($tasks as $task)
                                    <li class="list-group-item" style="background: rgba(255, 255, 255, 0.1); color: #fff; border: 2px solid rgba(255, 255, 255, 0.2);">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="{{ route('projects.tasks.edit', [$project, $task]) }}" class="text-light">{{ $task->name }}</a>
                                            <form action="{{ route('projects.tasks.destroy', [$project, $task]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No tasks available for this project.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
