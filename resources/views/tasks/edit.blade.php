@extends('layouts.app')

@section('content')
    <div class="container py-5" style="background: linear-gradient(135deg, #1e1e2f, #3b3b58); border-radius: 20px; box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5);">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0" style="overflow: hidden; background: rgba(40, 40, 60, 0.95); border-radius: 15px;">
                    <div class="card-header text-white text-center fs-4" style="background: linear-gradient(45deg, #6a11cb, #2575fc); font-weight: bold;">
                        Edit Task
                    </div>

                    <div class="card-body p-5 position-relative">
                        <form action="{{ route('update', $task->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="name" class="form-label text-light">Task Name:</label>
                                <input type="text" class="form-control @error('task_name') is-invalid @enderror" name="task_name" id="name" value="{{ $task->name }}" style="background: rgba(255, 255, 255, 0.1); color: #fff; border: 2px solid rgba(255, 255, 255, 0.2);">
                                @error('task_name')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="priority" class="form-label text-light">Priority:</label>
                                <input type="text" class="form-control" name="priority" value="{{ $task->priority }}" style="background: rgba(255, 255, 255, 0.1); color: #fff; border: 2px solid rgba(255, 255, 255, 0.2);">
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" name="done" class="form-check-input" id="done" {{ $task->done ? 'checked' : '' }} style="border-color: rgba(255, 255, 255, 0.4);">
                                <label class="form-check-label text-light" for="done">Completed</label>
                            </div>

                            <button type="submit" class="btn w-100 mb-3" style="background: linear-gradient(to right, #8e44ad, #3498db); color: #fff; font-weight: bold; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); transition: transform 0.3s, box-shadow 0.3s;">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
