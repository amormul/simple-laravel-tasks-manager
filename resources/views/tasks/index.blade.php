@extends('layouts.app')

@section('content')
    <div class="container py-5" style="background: linear-gradient(135deg, #1e1e2f, #3b3b58); border-radius: 20px; box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5);">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center" style="background: rgba(40, 40, 60, 0.95); border-radius: 15px;">
                    <h5 class="card-header list-group-item active list-group-item-primary" style="background: linear-gradient(45deg, #6a11cb, #2575fc); font-weight: bold;">
                        All Tasks
                        <a href="{{ route('create') }}" class="btn btn-success" style="float: right; background: linear-gradient(to right, #8e44ad, #3498db); color: #fff;">+</a>
                    </h5>

                    <div class="list-group">
                        @foreach ($tasks as $task)
                            <a href="{{ route('task', $task->id) }}" class="list-group-item list-group-item-action" style="background: rgba(255, 255, 255, 0.1); color: #fff; border: 2px solid rgba(255, 255, 255, 0.2);">
                                {{ $task->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
