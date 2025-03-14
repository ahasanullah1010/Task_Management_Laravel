{{-- @extends('layouts.app') --}}
@extends('dashboard')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4>Create New Task</h4>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Task Title</label>
                            <input type="text" name="title" class="form-control border-success" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control border-success" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Priority</label>
                            <select name="priority" class="form-select border-success">
                                <option value="Low">Low</option>
                                <option value="Medium" selected>Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Status</label>
                            <select name="status" class="form-select border-success">
                                <option value="Pending">Pending</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Due Date</label>
                            <input type="date" name="due_date" class="form-control border-success">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-lg px-4">Create Task</button>
                            <a href="{{ route('tasks.index') }}" class="btn btn-secondary btn-lg px-4">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
