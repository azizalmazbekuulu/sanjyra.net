<div class="form-group">
    <label for="">Статус</label>
    <select name="published" class="form-control">
        @if (isset($category->id))
            <option value="0" @if ($category->published == 0) selected="" @endif>Жарыяланган эмес</option>
            <option value="1" @if ($category->published == 1) selected="" @endif>Жарыяланган</option>
        @else
            <option value="0">Жарыяланган эмес</option>
            <option value="1">Жарыяланган</option>
        @endif
    </select>
</div>
<div class="form-group">
    <label for="">Аталыш</label>
    <input type="text" class="form-control" name="title" placeholder="Категориянын аталышы" value="{{$category->title ?? ''}}" required>
</div>
<div class="form-group">
    <label for="">Slug</label>
    <input type="text" class="form-control" name="slug" placeholder="Автоматтык түрдө түзүлөт" value="{{$category->slug ?? ''}}" readonly>
</div>
<div class="form-group">
    <label for="">Башкы категория</label>
    <select name="parent_id" class="form-control">
        <option value="0">-- башкы категориясыз --</option>
        @include('admin.categories.partials.categories', ['categories' => $categories])
    </select>
</div>
<input class="btn btn-primary" type="submit" value="Сактоо">
<hr>