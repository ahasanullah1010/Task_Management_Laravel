{{-- @extends('layouts.app') --}}
@extends('dashboard')

@section('title')


<div class="container py-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-info text-white text-center">
            <h4>Filter Tasks</h4>
        </div>
        <div class="card-body bg-light">
            <form action="{{ route('tasks.filter') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-3">
                    <label class="fw-bold text-primary">Priority</label>
                    <select name="priority" class="form-select border-info">
                        <option value="all">All</option>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="fw-bold text-primary">Status</label>
                    <select name="status" class="form-select border-info">
                        <option value="all">All</option>
                        <option value="Pending">Pending</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="fw-bold text-primary">Due Date</label>
                    <input type="date" name="due_date" class="form-control border-info">
                </div>

                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-info btn-lg px-4 me-2 text-white">Filter</button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-lg px-4">Reset</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('content')
<div class="container">

    
    
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-4">Create Task</a>

    <div class="row">
        @foreach ($tasks as $task)
            <div class="col-md-6 mb-2">
                <div class="card task-card 
                    @if($task->priority == 'High') priority-high 
                    @elseif($task->priority == 'Medium') priority-medium 
                    @else priority-low @endif">
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->title }}</h5>
                        <p class="card-text">
                            <strong>Priority:</strong> <span class="badge bg-secondary">{{ $task->priority }}</span><br>
                            <strong>Status:</strong> <span class="badge bg-success">{{ $task->status }}</span><br>
                            <strong>Due Date:</strong> {{ $task->due_date }}
                        </p>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
