<div class="form-group">
    <label for="">Аталыш</label>
    <input type="text" class="form-control" name="name" placeholder="Уруунун аталышы" value="{{$uruu->name ?? ''}}" required pattern="^[А-Яа-яӨөҢңҮү\s-]+$" title="Аталыш">
</div>
<div class="form-group">
    <label for="">Slug (Окшошу жок маани)</label>
    <input type="text" class="form-control" name="slug" placeholder="Автоматтык түрдө түзүлөт" value="{{$uruu->slug ?? ''}}" readonly>
</div>
<div class="form-group">
    <label for="">Башкы категория</label>
    <select name="categories[]" class="form-control" multiple="multiple">
        @include('admin.uruu.partials.categories', ['categories' => $categories])
    </select>
</div>
<div class="form-group">
    <label for="description_short">Кыскача аныктама</label>
    <textarea name="description_short" id="description_short">
        {{$uruu->description_short ?? ''}}
    </textarea>
</div>
<div class="form-group">
    <label for="description">Толук аныктама</label>
    <textarea name="description" id="description">
        {{$uruu->description ?? ''}}
    </textarea>
</div>
<input class="btn btn-primary" type="submit" value="Сактоо">
<hr>