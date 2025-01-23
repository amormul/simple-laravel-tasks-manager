@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4" style="background: rgba(40, 40, 60, 0.95); border-radius: 15px;">
                    <div class="card-header text-white text-center fs-4" style="background: linear-gradient(45deg, #6a11cb, #2575fc); font-weight: bold;">
                        Tasks
                    </div>
                    <div class="card-body text-light">
                        <a href="{{ route('projects.index') }}" class="btn btn-success mb-3">Back to Projects</a>
                        @if($tasks->isNotEmpty())
                            <div class="row">
                                @foreach($tasks as $task)
                                    <div class="col-md-4 mb-4">
                                        <div class="card" style="background: rgba(255, 255, 255, 0.1); color: #fff; border: 2px solid rgba(255, 255, 255, 0.2);">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $task->name }}</h5>

                                                <a href="{{ route('projects.tasks.edit', [$task->project_id, $task]) }}" class="btn btn-primary">Edit</a>

                                                <form action="{{ route('projects.tasks.destroy', [$task->project_id, $task]) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>No tasks available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
