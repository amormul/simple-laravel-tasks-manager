@extends('layouts.app')

@section('content')
    <div class="container py-5" style="background: linear-gradient(135deg, #1e1e2f, #3b3b58); border-radius: 20px; box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5);">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center" style="background: rgba(40, 40, 60, 0.95); border-radius: 15px;">
                    <h5 class="card-header" style="background: linear-gradient(45deg, #6a11cb, #2575fc); font-weight: bold;">Task Details</h5>
                    <div class="card-body">
                        <h5 class="card-title text-light">{{ $task->name }}</h5>
                        <p class="card-text text-light">ID: {{ $task->id }}</p>
                        <p class="card-text text-light">Priority: {{ $task->priority }}</p>
                        <p class="card-text text-light">Completed: {{ $task->done ? 'True' : 'False' }}</p>
                    </div>

                    <div class="modal-footer">
                        <form action="{{ route('delete', $task->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" style="background: linear-gradient(to right, #8e44ad, #3498db); color: #fff;">
                                Delete 🗑️
                            </button>
                        </form>
                        <form action="{{ route('edit', $task->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-primary" style="background: linear-gradient(to right, #8e44ad, #3498db); color: #fff;">
                                Edit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
