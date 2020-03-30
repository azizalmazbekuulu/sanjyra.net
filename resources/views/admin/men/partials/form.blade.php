@php
$active_person = $active_man;
if (isset($active_woman))
	$active_person = $active_woman;
@endphp
<div class="form-group">
	<label for="">Ысым</label>
	<input type="text" class="form-control" name="name" placeholder="Ысым" value="{{$active_person->name ?? ''}}" required pattern="^[А-Яа-яӨөҢңҮү\s-]+$" title="Ысым жазыңыз">
</div>
<div class="form-group">
	<label for="">Энесинин IDси</label>
	<input type="number" min="0" class="form-control" name="mother_id" placeholder="Энесинин IDси" value="{{$active_person->mother_id ?? ''}}">
</div>
<div class="form-group">
	<label for="">Энесинин аты</label>
	<input type="text" class="form-control" name="mother_name" placeholder="Энесинин аты"
	@if ($active_person->mother_id != 0)
		value="{{$active_person->mother()->first()->name ?? ''}}" readonly="readonly"
	@else
		value="{{$active_person->mother_name ?? ''}}"
	@endif pattern="^[А-Яа-яӨөҢңҮү\s-]{0,}" title="Энесинин аты">
</div>
@if (!isset($active_woman))
<div class="form-group">
	<label for="uruusu">Уруусу</label>
	<input type="text" class="form-control" name="uruusu" id="uruusu" placeholder="Уруусу" value="{{$active_person->uruusu ?? ''}}" @if ($active_person->uruusu != '')
		readonly="readonly"
	@endif pattern="^[А-Яа-яӨөҢңҮү\s-]{0,}" title="Уруусу">
</div>
@endif
<div class="form-group">
	<label for="photo">Сүрөт</label>
	<input type="file" name="photo" class="form-control-file" id="photo">
</div>
<div class="form-group">
	<label for="info">Маалымат</label>
	<textarea name="info" id="info">
		{!! $active_person->info ?? '' !!}
	</textarea>
</div>
<div class="form-group">
	<label for="">Категориялар</label>
	<select name="categories[]" class="form-control" multiple="multiple">
		@include('admin.men.partials.categories', ['categories' => $categories, 'active_person' => $active_person])
	</select>
</div>
<input type="hidden" name="father_id" value="{{$active_man->father_id}}">
<input type="hidden" name="level" value="{{$active_man->level}}">
<input type="hidden" name="kanchanchy_bala" value="{{$active_man->kanchanchy_bala}}">
<input class="btn btn-primary" type="submit" value="Сактоо">
<hr>