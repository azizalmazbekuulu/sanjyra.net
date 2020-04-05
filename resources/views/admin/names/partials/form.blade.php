<div class="form-group">
	<label for="">Аял - Эркек</label>
	<select name="male_female" class="form-control">
		@if (isset($name->id))
			<option value="0" @if ($name->male_female == 0) selected="" @endif>Аял ысымы</option>
			<option value="1" @if ($name->male_female == 1) selected="" @endif>Эркек ысымы</option>
		@else
			<option value="0">Аял ысымы</option>
			<option value="1">Эркек ысымы</option>
		@endif
	</select>
</div>
<div class="form-group">
	<label for="">Ысым</label>
	<input type="text" class="form-control" name="name" placeholder="Ысым" value="{{$name->name ?? ''}}" required pattern="^[А-Яа-яӨөҢңҮү\s-]+$" title="Ысым">
</div>
<div class="form-group">
	<label for="description">Аныктама</label>
	<textarea name="description" id="description">
		{!!$name->description ?? ''!!}
	</textarea>
</div>
<input class="btn btn-primary" type="submit" value="Сактоо">
<hr>