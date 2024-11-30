<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="title">Название:</label>
    <input type="text" name="title" id="title" value="{{ $task->title }}" required>

    <label for="description">Описание:</label>
    <textarea name="description" id="description">{{ $task->description }}</textarea>

    <label for="category_id">Категория:</label>
    <select name="category_id" id="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == $task->category_id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <label for="tags">Теги:</label>
    <select name="tags[]" id="tags" multiple>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}" {{ $task->tags->contains($tag->id) ? 'selected' : '' }}>
                {{ $tag->name }}
            </option>
        @endforeach
    </select>

    <button type="submit">Сохранить изменения</button>
</form>
