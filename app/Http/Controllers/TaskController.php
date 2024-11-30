<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Список задач
    public function index()
    {
        return view('tasks.index');
    }

    // Отображение задачи
    public function show($id)
    {
       // Получаем задачу с категорией и тегами
    $task = Task::with(['category', 'tags'])->findOrFail($id);
    
    // Отправляем данные в представление
    return view('tasks.show', compact('task'));

        return view('tasks.show', ['task' => $task]);
    }

    // Другие методы будут добавлены позже
    public function create() {
         // Получаем все категории и теги
    $categories = Category::all();
    $tags = Tag::all();
    
    // Отправляем данные в представление для отображения формы
    return view('tasks.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
{
    // Валидация данных (по желанию, можно добавить больше правил)
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',
        'tags' => 'nullable|array',
    ]);

    // Создаём новую задачу
    $task = Task::create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'category_id' => $request->input('category_id'),
    ]);

    // Сохраняем теги, если они есть
    if ($request->has('tags')) {
        $task->tags()->sync($request->input('tags'));
    }

    // Перенаправляем на страницу со списком задач
    return redirect()->route('tasks.index');
}

   public function edit($id)
{
    // Получаем задачу с категорией и тегами
    $task = Task::with(['category', 'tags'])->findOrFail($id);
    
    // Получаем все категории и теги
    $categories = Category::all();
    $tags = Tag::all();
    
    // Отправляем данные в представление для редактирования
    return view('tasks.edit', compact('task', 'categories', 'tags'));
}
public function update(Request $request, $id)
{
    // Валидация данных
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',
        'tags' => 'nullable|array',
    ]);

    // Получаем задачу
    $task = Task::findOrFail($id);

    // Обновляем данные задачи
    $task->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'category_id' => $request->input('category_id'),
    ]);

    // Обновляем теги
    if ($request->has('tags')) {
        $task->tags()->sync($request->input('tags'));
    }

    // Перенаправляем на страницу с задачей
    return redirect()->route('tasks.show', $task->id);
}

public function destroy($id)
{
    // Получаем задачу
    $task = Task::findOrFail($id);
    
    // Удаляем задачу
    $task->delete();

    // Перенаправляем на страницу со списком задач
    return redirect()->route('tasks.index');
}

}
