@extends('layouts.app')

@section('content')
    <div class="container py-5" style="background: linear-gradient(135deg, #1e1e2f, #3b3b58); border-radius: 20px; box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5);">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0" style="overflow: hidden; background: rgba(40, 40, 60, 0.95); border-radius: 15px;">
                    <div class="card-header text-white text-center fs-4" style="background: linear-gradient(45deg, #6a11cb, #2575fc); font-weight: bold;">
                        Create Task
                    </div>

                    <div class="card-body p-5 position-relative">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('projects.tasks.store', $project) }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="form-label text-light">Task Name:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" style="background: rgba(255, 255, 255, 0.1); color: #fff; border: 2px solid rgba(255, 255, 255, 0.2);" required>
                                @error('name')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label text-light">Description:</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" style="background: rgba(255, 255, 255, 0.1); color: #fff; border: 2px solid rgba(255, 255, 255, 0.2);">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="deadline" class="form-label text-light">Deadline:</label>
                                <input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" value="{{ old('deadline') }}" style="background: rgba(255, 255, 255, 0.1); color: #fff; border: 2px solid rgba(255, 255, 255, 0.2);">
                                @error('deadline')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="priority" class="form-label text-light">Priority:</label>
                                <input type="number" class="form-control @error('priority') is-invalid @enderror" name="priority" id="priority" value="{{ old('priority') }}" style="background: rgba(255, 255, 255, 0.1); color: #fff; border: 2px solid rgba(255, 255, 255, 0.2);" required>
                                @error('priority')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" name="done" class="form-check-input" id="done" style="border-color: rgba(255, 255, 255, 0.4);">
                                <label class="form-check-label text-light" for="done">Completed</label>
                            </div>

                            <button type="submit" class="btn w-100 mb-3" style="background: linear-gradient(to right, #8e44ad, #3498db); color: #fff; font-weight: bold; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); transition: transform 0.3s, box-shadow 0.3s;">
                                Create Task
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
