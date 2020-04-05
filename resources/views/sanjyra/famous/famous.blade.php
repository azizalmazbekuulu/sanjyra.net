@extends('sanjyra.layouts.app')
@section('title', 'Белгилүү инсандар')
@section('content')
@isset($famous_men)
<div class="d-flex flex-wrap row">
@foreach ($famous_men as $famous_man)
<div class="card m-2 col-auto text-center" style="width: 200px;">
	@isset($famous_man->image)
		<img src="{{ asset('storage/' . $famous_man->image) }}" class="card-img-top" alt="{{ $famous_man->name }}">
	@endisset
	<div class="card-body">
		<a class="card-text" href="{{route('man', $famous_man)}}">@if ($famous_man->id !== 1){{$famous_man->father->name}} уулу @endif{{ $famous_man->name }}</a><br>@if($famous_man->uruusu != '')Уруусу: {{$famous_man->uruusu}}@endif
	</div>
</div>
@endforeach
@endisset
@isset($famous_women)
@foreach ($famous_women as $famous_woman)
<div class="card m-2 col-auto text-center" style="width: 200px;">
	@isset($famous_woman->image)
		<img src="{{ asset('storage/' . $famous_woman->image) }}" class="card-img-top" alt="{{ $famous_woman->name }}">
	@endisset
	<div class="card-body">
		<a class="card-title" href="{{route('woman-show', $famous_woman)}}">{{$famous_woman->father->name}} кызы {{ $famous_woman->name }}</a><br>@if($famous_woman->father->uruusu != '')Уруусу: {{$famous_woman->father->uruusu}}@endif
	</div>
</div>
@endforeach
</div>
@if ($famous_men->total() > $famous_women->total())
{{$famous_men->links()}}
@else
{{$famous_women->links()}}
@endif
@endisset
@endsection