@extends('sanjyra.layouts.app')
@section('title', 'Белгилүү инсандар')
@section('content')
@if ($categories != null)
<div class="mb-3">
	<select id="select" class="leading-4 rounded-md" onchange="change_url()">
		@foreach ($categories as $cat)
		<option value="{{route('famous-people',$cat->slug)}}" @if($cat->id == $category->id)selected="selected"@endif>{{$cat->title}}</option>
		@endforeach
	</select>
</div>
@endif
@if($category != null)
<div class="flex flex-wrap justify-around">
	@foreach ($category->men as $famous_man)
	<a class="rounded-md hover:underline hover:text-blue-500 m-2 hover:bg-blue-300 h-auto" href="{{route('man', $famous_man)}}">
		<div class="rounded-md border border-red-400 shadow-xl p-2 text-center h-full" style="width: 200px;">
			@isset($famous_man->image)
			<img src="{{ asset('storage/' . $famous_man->image) }}" class="flex-shrink-0 rounded-lg" alt="{{ $famous_man->name }}">
			@endisset
			<div class="p-4">@if ($famous_man->id !== 1){{$famous_man->father->name}} уулу @endif{{ $famous_man->name }}<br>@if($famous_man->uruusu != '')Уруусу: {{$famous_man->uruusu}}@endif
			</div>
		</div>
	</a>
	@endforeach
	@foreach ($category->women as $famous_woman)
	<a class="rounded-md hover:underline hover:text-blue-500 m-2 hover:bg-blue-300 h-auto" href="{{route('woman-show', $famous_woman)}}">
		<div class="rounded-md border border-red-400 shadow-2xl p-2 text-center" style="width: 200px;">
			@isset($famous_woman->image)
			<img src="{{ asset('storage/' . $famous_woman->image) }}" class="flex-shrink-0 rounded-t-none rounded-b-sm" alt="{{ $famous_woman->name }}">
			@endisset
			<div class="p-4">
				{{$famous_woman->father->name}} кызы {{ $famous_woman->name }}<br>@if($famous_woman->father->uruusu != '')Уруусу: {{$famous_woman->father->uruusu}}@endif
			</div>
		</div>
	</a>
	@endforeach
	@endif
</div>
@endsection
@section('script')
<script>
	function change_url() {
		window.open(document.getElementById("select").value, '_self');
	}
</script>
@endsection