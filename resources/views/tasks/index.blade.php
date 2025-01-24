@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4" style="background: rgba(40, 40, 60, 0.95); border-radius: 15px;">
                    <div class="card-header text-white text-center fs-4" style="background: linear-gradient(45deg, #6a11cb, #2575fc); font-weight: bold;">
                        Task List
                    </div>
                    <div class="card-body text-light">
                        @if($tasks->isEmpty())
                            <p class="text-center">No tasks available.</p>
                        @else
                            <table class="table table-dark table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Due Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>{{ $task->status ?? 'Not specified' }}</td>
                                        <td>{{ $task->deadline ?? 'Not specified' }}</td>
                                        <td>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="{{ route('projects.tasks.edit', [$project, $task]) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('projects.tasks.details', [$project, $task]) }}" class="btn btn-info">View Details</a>
                                                <form action="{{ route('projects.tasks.destroy', [$project, $task]) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
