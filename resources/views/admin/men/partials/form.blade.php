<div class="form-group">
    <label for="">Ысым</label>
    <input type="text" class="form-control" name="title" placeholder="Ысым" @if (isset($man->name)) value="{{$man->name}}"
            @else value=""
            @endif required>
</div>
<div class="form-group">
    <label for="">Энесинин IDси</label>
    <input type="text" class="form-control" name="slug" placeholder="Энесинин IDси" @if (isset($man->mother_id)) value="{{$man->mother_id}}"
    @else value=""
    @endif>
</div>
<div class="form-group">
    <label for="">Энесинин аты</label>
    <input type="text" class="form-control" name="slug" placeholder="Энесинин аты" @if (isset($man->mother_name)) value="{{$man->mother_name}}"
    @else value=""
    @endif>
</div>
<div class="form-group">
    <label for="">Башкы категория</label>
    <select name="categories[]" class="form-control" multiple="multiple">
        @include('admin.articles.partials.categories', ['categories' => $categories])
    </select>
</div>
<div class="form-group">
    <label for="info">Маалымат</label>
    <textarea name="info" id="info">
        @if (isset($man->info)) {{$man->info}} @endif
    </textarea>
</div>
<hr>
<input class="btn btn-primary" type="submit" value="Сактоо">