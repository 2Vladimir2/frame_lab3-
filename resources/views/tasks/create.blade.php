<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <label for="title">Название:</label>
    <input type="text" name="title" id="title" required>

    <label for="description">Описание:</label>
    <textarea name="description" id="description"></textarea>

    <label for="category_id">Категория:</label>
    <select name="category_id" id="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <label for="tags">Теги:</label>
    <select name="tags[]" id="tags" multiple>
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>

    <button type="submit">Создать задачу</button>
</form>
