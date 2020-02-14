<div class="form-group">
    <label for="">Статус</label>
    <select name="published" class="form-control">
        @if (isset($article->id))
            <option value="0" @if ($article->published == 0) selected="" @endif>Не опубликовано</option>
            <option value="1" @if ($article->published == 1) selected="" @endif>Опубликовано</option>
        @else
            <option value="0">Не опубликовано</option>
            <option value="1">Опубликовано</option>
        @endif
    </select>
</div>
<div class="form-group">
    <label for="">Заголовок</label>
    <input type="text" class="form-control" name="title" placeholder="Заголовок новости" @if (isset($article->title)) value="{{$article->title}}"
            @else value=""
            @endif required>
</div>
<div class="form-group">
    <label for="">Slug (Уникальное значение)</label>
    <input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" @if (isset($article->slug)) value="{{$article->slug}}"
    @else value=""
    @endif readonly>
</div>
<div class="form-group">
    <label for="">Родительская категория</label>
    <select name="categories[]" class="form-control" multiple="multiple">
        @include('admin.articles.partials.categories', ['categories' => $categories])
    </select>
</div>
<div class="form-group">
    <label for="description_short">Краткое описание</label>
    <textarea name="description_short" id="description_short">
        @if (isset($article->description_short)) {{$article->description_short}} @endif
    </textarea>
</div>
<div class="form-group">
    <label for="description">Полное описание</label>
    <textarea name="description" id="description">
        @if (isset($article->description)) {{$article->description}} @endif
    </textarea>
</div>
<div class="form-group">
    <label for="">Мета заголовок</label>
    <input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок" @if (isset($article->meta_title)) value="{{$article->meta_title}}"
            @else value=""
            @endif required>
</div>
<div class="form-group">
    <label for="">Мета описание</label>
    <input type="text" class="form-control" name="meta_description" placeholder="Мета описание" @if (isset($article->meta_description)) value="{{$article->meta_description}}"
            @else value=""
            @endif required>
</div>
<div class="form-group">
    <label for="">Ключевое слово</label>
    <input type="text" class="form-control" name="meta_keyword" placeholder="Ключевое слово" @if (isset($article->meta_keyword)) value="{{$article->meta_keyword}}"
            @else value=""
            @endif required>
</div>
<hr>
<input class="btn btn-primary" type="submit" value="Сохранить">