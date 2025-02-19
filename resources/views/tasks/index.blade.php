@extends('layouts.app')

@section('content')
    <h1>Tasks</h1>
    <a href="{{ route('tasks.create') }}">Create New Task</a>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
                (Category: {{ $task->category->name }})
                @foreach ($task->tags as $tag)
                    <span>{{ $tag->name }}</span>
                @endforeach
            </li>
        @endforeach
    </ul>
@endsection

