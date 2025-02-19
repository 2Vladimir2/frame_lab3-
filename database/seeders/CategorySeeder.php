<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Пример данных для заполнения
        $categories = [
            ['name' => 'Work', 'description' => 'Tasks related to work'],
            ['name' => 'Personal', 'description' => 'Personal tasks'],
            ['name' => 'Urgent', 'description' => 'Urgent tasks'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}


