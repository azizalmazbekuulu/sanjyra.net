<div class="form-group">
    <label for="">Статус</label>
    <select name="published" class="form-control">
        @if (isset($category->id))
            <option value="0" @if ($category->published == 0) selected="" @endif>Не опубликовано</option>
            <option value="1" @if ($category->published == 1) selected="" @endif>Опубликовано</option>
        @else
            <option value="0">Не опубликовано</option>
            <option value="1">Опубликовано</option>
        @endif
    </select>
</div>
<div class="form-group">
    <label for="">Наименование</label>
    <input type="text" class="form-control" name="title" placeholder="Заголовок категории" @if (isset($category->title)) value="{{$category->title}}"
            @else value=""
            @endif required>
</div>
<div class="form-group">
    <label for="">Slug</label>
    <input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" @if (isset($category->slug)) value="{{$category->slug}}"
    @else value=""
    @endif readonly>
</div>
<div class="form-group">
    <label for="">Родительская категория</label>
    <select name="parent_id" class="form-control">
        <option value="0">-- без родительской категории --</option>
        @include('admin.categories.partials.categories', ['categories' => $categories])
    </select>
</div>
<hr>
<input class="btn btn-primary" type="submit" value="Сохранить">