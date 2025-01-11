@extends('layouts.app')

@section('content')
<h2>Edit Task</h2>
<form action="{{ route('tasks.update', $task) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" value="{{ $task->title }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ $task->description }}</textarea>
    </div>

    <div class="mb-3">
        <label for="is_completed" class="form-label">Completed</label>
        <input type="checkbox" value="0" name="is_completed" {{ $task->is_completed ? 'checked' : '' }}>
    </div>

    <button type="submit" class="btn btn-primary">Update Task</button>
</form>
@endsection
