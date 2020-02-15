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
    <input type="text" class="form-control" name="title" placeholder="Макаланын аталышы" @if (isset($article->title)) value="{{$article->title}}"
            @else value=""
            @endif required>
</div>
<div class="form-group">
    <label for="">Slug (Окшошу жок маани)</label>
    <input type="text" class="form-control" name="slug" placeholder="Автоматтык түрдө түзүлөт" @if (isset($article->slug)) value="{{$article->slug}}"
    @else value=""
    @endif readonly>
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
        @if (isset($article->description_short)) {{$article->description_short}} @endif
    </textarea>
</div>
<div class="form-group">
    <label for="description">Толук аныктама</label>
    <textarea name="description" id="description">
        @if (isset($article->description)) {{$article->description}} @endif
    </textarea>
</div>
<div class="form-group">
    <label for="">Мета аталыш</label>
    <input type="text" class="form-control" name="meta_title" placeholder="Мета аталыш" @if (isset($article->meta_title)) value="{{$article->meta_title}}"
            @else value=""
            @endif required>
</div>
<div class="form-group">
    <label for="">Мета аныктама</label>
    <input type="text" class="form-control" name="meta_description" placeholder="Мета аныктама" @if (isset($article->meta_description)) value="{{$article->meta_description}}"
            @else value=""
            @endif required>
</div>
<div class="form-group">
    <label for="">Ачкыч сөздөр</label>
    <input type="text" class="form-control" name="meta_keyword" placeholder="Ачкыч сөздөр" @if (isset($article->meta_keyword)) value="{{$article->meta_keyword}}"
            @else value=""
            @endif required>
</div>
<hr>
<input class="btn btn-primary" type="submit" value="Сактоо">