<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_tag', function (Blueprint $table) {
            $table->id(); // id — первичный ключ
            $table->unsignedBigInteger('task_id'); // связь с задачей
            $table->unsignedBigInteger('tag_id'); // связь с тегом
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade'); // внешний ключ на таблицу tasks
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade'); // внешний ключ на таблицу tags
            $table->timestamps(); // created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_tag');
    }
};
