<div class="form-group">
    <label for="">Статус</label>
    <select name="published" class="form-control">
        @if (isset($name->id))
            <option value="0" @if ($name->published == 0) selected="" @endif>Не опубликовано</option>
            <option value="1" @if ($name->published == 1) selected="" @endif>Опубликовано</option>
        @else
            <option value="0">Не опубликовано</option>
            <option value="1">Опубликовано</option>
        @endif
    </select>
</div>
<div class="form-group">
    <label for="">Ысым</label>
    <input type="text" class="form-control" name="name" placeholder="Ысым" @if (isset($name->name)) value="{{$name->name}}"
            @else value=""
            @endif required>
</div>
<div class="form-group">
    <label for="">Slug (Окшошу жок маани)</label>
    <input type="text" class="form-control" name="slug" placeholder="Автоматтык түрдө түзүлөт" @if (isset($name->slug)) value="{{$name->slug}}"
    @else value=""
    @endif readonly>
</div>
<div class="form-group">
    <label for="description">Аныктама</label>
    <textarea name="description" id="description">
        @if (isset($name->description)) {{$name->description}} @endif
    </textarea>
</div>
<hr>
<input class="btn btn-primary" type="submit" value="Сактоо">