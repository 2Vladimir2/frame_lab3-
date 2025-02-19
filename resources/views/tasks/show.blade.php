@extends('layouts.app')

@section('content')
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <p>Category: {{ $task->category->name }}</p>
    <p>Tags:
        @foreach ($task->tags as $tag)
            <span>{{ $tag->name }}</span>
        @endforeach
    </p>
    <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
