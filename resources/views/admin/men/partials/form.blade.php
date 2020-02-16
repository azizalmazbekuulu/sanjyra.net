<div class="form-group">
    <label for="">Ысым</label>
    <input type="text" class="form-control" name="name" placeholder="Ысым" @if (isset($man->name)) value="{{$man->name}}"
            @else value=""
            @endif required>
</div>
<div class="form-group">
    <label for="">Атасынын IDси</label>
    <input type="text" class="form-control" name="father_id" placeholder="Атасынын IDси" @if (isset($man->father_id)) value="{{$man->father_id}}" readonly="readonly"
    @else value=""
    @endif>
</div>
<div class="form-group">
    <label for="">Level</label>
    <input type="text" class="form-control" name="level" placeholder="Level" @if (isset($man->level)) value="{{$man->level}}" readonly="readonly"
    @else value=""
    @endif>
</div>
<div class="form-group">
    <label for="">Канчанчы бала</label>
    <input type="text" class="form-control" name="kanchanchy_bala" placeholder="Канчанчы бала" @if (isset($man->kanchanchy_bala)) value="{{$man->kanchanchy_bala}}" readonly="readonly"
    @else value=""
    @endif>
</div>
<div class="form-group">
    <label for="">Энесинин IDси</label>
    <input type="text" class="form-control" name="mother_id" placeholder="Энесинин IDси" @if (isset($man->mother_id)) value="{{$man->mother_id}}"
    @else value=""
    @endif>
</div>
<div class="form-group">
    <label for="">Энесинин аты</label>
    <input type="text" class="form-control" name="mother_name" placeholder="Энесинин аты" @if (isset($man->mother_name)) value="{{$man->mother_name}}"
    @else value=""
    @endif>
</div>
<div class="form-group">
    <label for="">Уруусу</label>
    <input type="text" class="form-control" name="uruusu" placeholder="Уруусу" @if (isset($man->uruusu)) value="{{$man->uruusu}}" readonly="readonly"
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