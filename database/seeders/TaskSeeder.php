<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        // Пример данных для заполнения
        $tasks = [
            ['title' => 'Finish homework', 'description' => 'Complete the math assignment', 'category_id' => 1],
            ['title' => 'Grocery shopping', 'description' => 'Buy fruits and vegetables', 'category_id' => 2],
            ['title' => 'Prepare presentation', 'description' => 'Work on the project presentation', 'category_id' => 1],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}


