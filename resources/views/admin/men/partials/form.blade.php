<div class="form-group">
    <label for="">Ысым</label>
    <input type="text" class="form-control" name="name" placeholder="Ысым" value="{{$active_man->name ?? ''}}" required>
</div>
<div class="form-group">
    <label for="">Энесинин IDси</label>
    <input type="text" class="form-control" name="mother_id" placeholder="Энесинин IDси" value="{{$active_man->mother_id ?? ''}}">
</div>
<div class="form-group">
    <label for="">Энесинин аты</label>
    <input type="text" class="form-control" name="mother_name" placeholder="Энесинин аты" value="{{$active_man->mother_name ?? ''}}">
</div>
<div class="form-group">
    <label for="info">Маалымат</label>
    <textarea name="info" id="info">
        {!!$active_man->info ?? ''!!}
    </textarea>
</div>
<div class="form-group">
    <label for="">Категориялар</label>
    <select name="categories[]" class="form-control" multiple="multiple">
        @include('admin.articles.partials.categories', ['categories' => $categories])
    </select>
</div>
<input type="hidden" name="father_id" value="{{$active_man->father_id}}">
<input type="hidden" name="uruusu" value="{{$active_man->uruusu}}">
<input type="hidden" name="level" value="{{$active_man->level}}">
<input type="hidden" name="kanchanchy_bala" value="{{$active_man->kanchanchy_bala}}">
<hr>
<input class="btn btn-primary" type="submit" value="Сактоо">