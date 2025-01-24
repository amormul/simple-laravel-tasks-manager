@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4" style="background: rgba(40, 40, 60, 0.95); border-radius: 15px;">
                    <div class="card-header text-white text-center fs-4" style="background: linear-gradient(45deg, #6a11cb, #2575fc); font-weight: bold;">
                        Task Details
                    </div>
                    <div class="card-body text-light">
                        <h5>Name: {{ $task->name }}</h5>
                        <p>Description: {{ $task->description }}</p>
                        <p>Status: {{ $task->status ?? 'No status available' }}</p>
                        <p>Due Date: {{ $task->deadline ?? 'No due date available' }}</p>
                        <a href="{{ route('projects.tasks.edit', [$project, $task]) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('projects.tasks.index', $project) }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
