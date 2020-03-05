<div class="form-group">
    <label for="">Ысым</label>
    <input type="text" class="form-control" name="name" placeholder="Ысым" 
    @if (isset($active_woman))
        value="{{$active_woman->name ?? ''}}"  
    @else
        value="{{$active_man->name ?? ''}}" 
    @endif
    required>
</div>
<div class="form-group">
    <label for="">Энесинин IDси</label>
    <input type="text" class="form-control" name="mother_id" placeholder="Энесинин IDси"  
    @if (isset($active_woman))
        value="{{$active_woman->mother_id ?? ''}}"  
    @else
        value="{{$active_man->mother_id ?? ''}}" 
    @endif>
</div>
<div class="form-group">
    <label for="">Энесинин аты</label>
    <input type="text" class="form-control" name="mother_name" placeholder="Энесинин аты" @if (isset($active_woman))
        @if ($active_woman->mother_id != 0)
            value="{{$active_woman->mother()->first()->name ?? ''}}" readonly="readonly"
        @else
            value="{{$active_woman->mother_name ?? ''}}"
        @endif
    @else
        @if ($active_man->mother_id != 0)
            value="{{$active_man->mother()->first()->name ?? ''}}" readonly="readonly"
        @else
            value="{{$active_man->mother_name ?? ''}}"
        @endif
    @endif>
</div>
@if (!isset($active_woman))
<div class="form-group">
    <label for="uruusu">Уруусу</label>
    <input type="text" class="form-control" name="uruusu" id="uruusu" placeholder="Уруусу" value="{{$active_man->uruusu ?? ''}}" @if ($active_man->uruusu != '')
        readonly="readonly"
    @endif>
</div>
@endif
<div class="form-group">
    <label for="photo">Сүрөт</label>
    <input type="file" name="photo" class="form-control-file" id="photo">
</div>
<div class="form-group">
    <label for="info">Маалымат</label>
    <textarea name="info" id="info">
        @if (isset($active_woman))
            {!! $active_woman->info ?? '' !!}
        @else
            {!! $active_man->info ?? '' !!}
        @endif
    </textarea>
</div>
<div class="form-group">
    <label for="">Категориялар</label>
    <select name="categories[]" class="form-control" multiple="multiple">
        @include('admin.articles.partials.categories', ['categories' => $categories])
    </select>
</div>
<input type="hidden" name="father_id" value="{{$active_man->father_id}}">
<input type="hidden" name="level" value="{{$active_man->level}}">
<input type="hidden" name="kanchanchy_bala" value="{{$active_man->kanchanchy_bala}}">
<input class="btn btn-primary" type="submit" value="Сактоо">
<hr>