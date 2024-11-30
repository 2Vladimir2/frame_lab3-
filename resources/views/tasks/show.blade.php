@extends('layouts.app')

@section('title', 'Задача: {{ $task["title"] }}')

@section('content')
    <h2>Задача: {{ $task['title'] }}</h2>
    <p><strong>Описание:</strong> {{ $task['description'] }}</p>
    <p><strong>Дата создания:</strong> {{ $task['created_at'] }}</p>
    <p><strong>Дата обновления:</strong> {{ $task['updated_at'] }}</p>
    <p><strong>Статус:</strong> {{ $task['status'] }}</p>
    <p><strong>Приоритет:</strong> {{ $task['priority'] }}</p>
    <p><strong>Исполнитель:</strong> {{ $task['assignee'] }}</p>
    <p><a href="#">Редактировать</a> | <a href="#">Удалить</a></p>
@endsection

<h3>{{ $task->title }}</h3>
<p>{{ $task->description }}</p>
<p>Категория: {{ $task->category->name }}</p>
<p>Теги: 
    @foreach($task->tags as $tag)
        {{ $tag->name }} 
    @endforeach
</p>
<a href="{{ route('tasks.edit', $task->id) }}">Редактировать</a>

<form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Удалить</button>
</form>
