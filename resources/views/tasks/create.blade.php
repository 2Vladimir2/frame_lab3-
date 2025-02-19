@extends('layouts.app')

@section('content')
    <h1>Create Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description"></textarea>
        </div>
        <div>
            <label for="category_id">Category</label>
            <select name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="tags">Tags</label>
            @foreach ($tags as $tag)
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->name }}
            @endforeach
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
