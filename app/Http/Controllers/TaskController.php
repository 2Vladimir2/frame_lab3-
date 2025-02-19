<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('category', 'tags')->get();
        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
       $categories = Category::all();
       $tags = Tag::all();
       return view('tasks.create', compact('categories', 'tags'));
    }


    public function store(Request $request)
   {
       $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',
        'tags' => 'array|exists:tags,id',
    ]);

        $task = Task::create($validatedData);
        $task->tags()->attach($request->tags);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
   }


    public function show($id)
    {
       $task = Task::with('category', 'tags')->findOrFail($id);
        return view('tasks.show', compact('task'));
    }


    public function edit($id)
   {
       $task = Task::with('tags')->findOrFail($id);
       $categories = Category::all();
       $tags = Tag::all();
    return view('tasks.edit', compact('task', 'categories', 'tags'));
    }  


    public function update(Request $request, $id)
    {
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',
        'tags' => 'array|exists:tags,id',
    ]);

       $task = Task::findOrFail($id);
       $task->update($validatedData);
       $task->tags()->sync($request->tags);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }


    public function destroy($id)
   {
       $task = Task::findOrFail($id);
       $task->tags()->detach();
       $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

}
