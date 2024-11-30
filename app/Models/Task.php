<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'category_id'];


    public function category()
{
    return $this->belongsTo(Category::class); // Много к одному (задача прикреплена к одной категории)
}

public function tags()
{
    return $this->belongsToMany(Tag::class, 'task_tag'); // Множество к множеству (задача может иметь много тегов)
}



}
