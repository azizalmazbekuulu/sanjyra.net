@extends('sanjyra.layouts.app')
@section('title', 'Белгилүү инсандар')
@section('content')
@if ($categories != null)
<div class="input-group">
<select id="select" class="custom-select" onchange="change_url()">
@foreach ($categories as $cat)
	<option value="{{route('famous-people',$cat->slug)}}" @if($cat->id == $category->id)selected="selected"@endif>{{$cat->title}}</option>
@endforeach
</select>
</div>
@endif
@if($category != null)
<div class="d-flex flex-wrap row">
@foreach ($category->men as $famous_man)
<div class="card m-2 col-auto text-center" style="width: 200px;">
@isset($famous_man->image)
<img src="{{ asset('storage/' . $famous_man->image) }}" class="card-img-top" alt="{{ $famous_man->name }}">
@endisset
<div class="card-body">
<a class="card-text" href="{{route('man', $famous_man)}}">@if ($famous_man->id !== 1){{$famous_man->father->name}} уулу @endif{{ $famous_man->name }}</a><br>@if($famous_man->uruusu != '')Уруусу: {{$famous_man->uruusu}}@endif
</div>
</div>
@endforeach
@foreach ($category->women as $famous_woman)
<div class="card m-2 col-auto text-center" style="width: 200px;">
@isset($famous_woman->image)
<img src="{{ asset('storage/' . $famous_woman->image) }}" class="card-img-top" alt="{{ $famous_woman->name }}">
@endisset
<div class="card-body">
<a class="card-title" href="{{route('woman-show', $famous_woman)}}">{{$famous_woman->father->name}} кызы {{ $famous_woman->name }}</a><br>@if($famous_woman->father->uruusu != '')Уруусу: {{$famous_woman->father->uruusu}}@endif
</div>
</div>
@endforeach
@endif
</div>
@endsection
@section('script')
<script>
function change_url() {
window.open(document.getElementById("select").value,'_self');
}
</script>
@endsection