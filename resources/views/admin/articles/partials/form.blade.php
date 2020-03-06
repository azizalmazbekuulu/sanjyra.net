<div class="form-group">
    <label for="">Статус</label>
    <select name="published" class="form-control">
        @if (isset($article->id))
            <option value="0" @if ($article->published == 0) selected="" @endif>Жарыяланган эмес</option>
            <option value="1" @if ($article->published == 1) selected="" @endif>Жарыяланган</option>
        @else
            <option value="0">Жарыяланган эмес</option>
            <option value="1">Жарыяланган</option>
        @endif
    </select>
</div>
<div class="form-group">
    <label for="">Аталыш</label>
    <input type="text" class="form-control" name="title" placeholder="Макаланын аталышы" value="{{$article->title ?? ''}}" required>
</div>
<div class="form-group">
    <label for="">Slug (Окшошу жок маани)</label>
    <input type="text" class="form-control" name="slug" placeholder="Автоматтык түрдө түзүлөт" value="{{$article->slug ?? ''}}" readonly>
</div>
@if ($article->image != null)
    <img src="{{ asset('storage/'.$article->image) }}" alt="{{$article->name}}">
@endif
<div class="form-group">
    <label for="photo">Сүрөт</label>
    <input class="form-control-file" type="file" name="photo" id="photo">
</div>
<div class="form-group">
    <label for="">Башкы категория</label>
    <select name="categories[]" class="form-control" multiple="multiple">
        @include('admin.articles.partials.categories', ['categories' => $categories])
    </select>
</div>
<div class="form-group">
    <label for="description_short">Кыскача аныктама</label>
    <textarea name="description_short" id="description_short">
        {{$article->description_short ?? ''}}
    </textarea>
</div>
<div class="form-group">
    <label for="description">Толук аныктама</label>
    <textarea name="description" id="description">
        {{$article->description ?? ''}}
    </textarea>
</div>
<div class="form-group">
    <label for="">Мета аталыш</label>
    <input type="text" class="form-control" name="meta_title" placeholder="Мета аталыш" value="{{$article->meta_title ?? ''}}" required>
</div>
<div class="form-group">
    <label for="">Мета аныктама</label>
    <input type="text" class="form-control" name="meta_description" placeholder="Мета аныктама" value="{{$article->meta_description ?? ''}}" required>
</div>
<div class="form-group">
    <label for="">Ачкыч сөздөр</label>
    <input type="text" class="form-control" name="meta_keyword" placeholder="Ачкыч сөздөр" value="{{$article->meta_keyword ?? ''}}" required>
</div>
<input class="btn btn-primary" type="submit" value="Сактоо">
<hr>