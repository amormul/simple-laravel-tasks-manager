@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4" style="background: rgba(40, 40, 60, 0.95); border-radius: 15px;">
                    <div class="card-header text-white text-center fs-4" style="background: linear-gradient(45deg, #6a11cb, #2575fc); font-weight: bold;">
                        Projects
                    </div>
                    <div class="card-body text-light">
                        <a href="{{ route('projects.create') }}" class="btn btn-success mb-3">Create Project</a>
                        @if($projects->isNotEmpty())
                            <div class="row">
                                @foreach($projects as $project)
                                    <div class="col-md-4 mb-4">
                                        <div class="card" style="background: rgba(255, 255, 255, 0.1); color: #fff; border: 2px solid rgba(255, 255, 255, 0.2);">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $project->name }}</h5>
                                                <p class="card-text">{{ $project->description }}</p>
                                                <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">View</a>
                                                <a href="{{ route('projects.edit', $project) }}" class="btn btn-secondary">Edit</a>
                                                <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline">
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
                            <p>No projects available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
