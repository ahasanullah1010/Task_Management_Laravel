{{-- @extends('layouts.app') --}}
@extends('dashboard')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Update Task</h4>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold">Task Title</label>
                            <input type="text" name="title" class="form-control border-primary" value="{{ $task->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control border-primary" rows="3">{{ $task->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Priority</label>
                            <select name="priority" class="form-select border-primary">
                                <option value="Low" {{ $task->priority == 'Low' ? 'selected' : '' }}>Low</option>
                                <option value="Medium" {{ $task->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                                <option value="High" {{ $task->priority == 'High' ? 'selected' : '' }}>High</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Status</label>
                            <select name="status" class="form-select border-primary">
                                <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Due Date</label>
                            <input type="date" name="due_date" class="form-control border-primary" value="{{ $task->due_date }}">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-lg px-4">Update Task</button>
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-lg px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
