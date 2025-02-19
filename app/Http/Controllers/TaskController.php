<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return 'This is a list of tasks';
    }

    public function create()
    {
        return 'Form for creating a task';
    }

    public function store(Request $request)
    {
        // Позже тут будет логика сохранения
    }

    public function show($id)
    {
        return "Displaying task with ID: $id";
    }

    public function edit($id)
    {
        return "Form for editing task with ID: $id";
    }

    public function update(Request $request, $id)
    {
        // Позже тут будет логика обновления
    }

    public function destroy($id)
    {
        // Позже тут будет логика удаления
    }
}
