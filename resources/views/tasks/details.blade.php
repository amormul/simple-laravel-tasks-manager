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
                        <p><strong>Name:</strong> {{ $task->name }}</p>
                        <p><strong>Description:</strong> {{ $task->description }}</p>
                        <p><strong>Status:</strong> {{ $task->status ?? 'No status available' }}</p>
                        <p><strong>Due Date:</strong> {{ $task->due_date ?? 'No due date available' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
