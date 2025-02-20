<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Добавляем связь с задачами
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
