<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,  // случайное название задачи
            'description' => $this->faker->text,  // случайное описание задачи
            'category_id' => function() {
                return Category::inRandomOrder()->first()->id;  // случайная категория
            },
        ];
    }
}
