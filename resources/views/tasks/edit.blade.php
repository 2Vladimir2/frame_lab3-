@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ $task->title }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description">{{ $task->description }}</textarea>
        </div>
        <div>
            <label for="category_id">Category</label>
            <select name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="tags">Tags</label>
            @foreach ($tags as $tag)
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                    {{ $task->tags->contains($tag->id) ? 'checked' : '' }}>
                {{ $tag->name }}
            @endforeach
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
