<div class="form-group">
	<label for="">Аталыш</label>
	<input type="text" class="form-control" name="title" placeholder="Аталышы" value="{{$literature->title ?? ''}}" required>
</div>
<div class="form-group">
	<label for="">Slug (Окшошу жок маани)</label>
	<input type="text" class="form-control" name="slug" placeholder="Автоматтык түрдө түзүлөт" value="{{$literature->slug ?? ''}}" readonly>
</div>
<div class="form-group">
	<label for="author">Автору</label>
	<input type="text" class="form-control" name="author" id="author" placeholder="Автору" value="{{$literature->author ?? ''}}" required pattern="^[А-Яа-яӨөҢңҮү\s-]+$" title="Автору">
</div>
<div class="form-group">
	<label for="">Башкы категория</label>
	<select name="categories[]" class="custom-select" multiple="multiple">
		@include('admin.literatures.partials.categories', ['categories' => $categories])
	</select>
</div>
@if ($literature != null && $literature->image != null)
	<img src="{{ asset('storage/'.$literature->image) }}" alt="{{$literature->name}}">
@endif
<div class="form-group">
	<label for="photo">Сүрөт</label>
	<input class="form-control-file" type="file" name="photo" id="photo">
</div>
<div class="form-group">
	<label for="description">Аныктама</label>
	<textarea name="description" id="description">
		{{$literature->description ?? ''}}
	</textarea>
</div>
<input class="btn btn-primary" type="submit" value="Сактоо">
<hr>