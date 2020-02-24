<div class="form-group">
    <label for="">Аял - Эркек</label>
    <select name="male_female" class="form-control">
        @if (isset($name->id))
            <option value="0" @if ($name->male_female == 0) selected="" @endif>Аял ысымы</option>
            <option value="1" @if ($name->male_female == 1) selected="" @endif>Эркек ысымы</option>
        @else
            <option value="0">Не опубликовано</option>
            <option value="1">Опубликовано</option>
        @endif
    </select>
</div>
<div class="form-group">
    <label for="">Ысым</label>
    <input type="text" class="form-control" name="name" placeholder="Ысым" value="{{$name->name ?? ''}}" required>
</div>
<div class="form-group">
    <label for="">Slug (Окшошу жок маани)</label>
    <input type="text" class="form-control" name="slug" placeholder="Автоматтык түрдө түзүлөт" value="{{$name->slug ?? ''}}" readonly>
</div>
<div class="form-group">
    <label for="description">Аныктама</label>
    <textarea name="description" id="description">
        {{$name->description ?? ''}}
    </textarea>
</div>
<hr>
<input class="btn btn-primary" type="submit" value="Сактоо">