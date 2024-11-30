@extends('layouts.app')

@section('title', 'Список задач')

@section('content')
    <h2>Список задач</h2>
    <ul>
        <li><a href="{{ route('tasks.show', 1) }}">Task 1</a></li>
        <li><a href="{{ route('tasks.show', 2) }}">Task 2</a></li>
        <li><a href="{{ route('tasks.show', 3) }}">Task 3</a></li>
    </ul>
@endsection

@foreach($tasks as $task)
    <div>
        <h3>{{ $task->title }}</h3>
        <p>{{ $task->description }}</p>
        <p>Категория: {{ $task->category->name }}</p>
        <p>Теги: 
            @foreach($task->tags as $tag)
                {{ $tag->name }} 
            @endforeach
        </p>
        <a href="{{ route('tasks.show', $task->id) }}">Посмотреть</a>
    </div>
@endforeach
