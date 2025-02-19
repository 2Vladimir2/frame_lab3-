<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run()
    {
        // Создаем 10 тегов с помощью фабрики
        Tag::factory(10)->create();
    }
}

