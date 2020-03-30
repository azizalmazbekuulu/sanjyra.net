@extends('sanjyra.layouts.app')
@section('title', 'Белгилүү инсандар')
@section('content')
@isset($famous_men)
<div class="container">
<div class="d-flex flex-wrap row">
	@foreach ($famous_men as $famous_man)
	<div class="card" style="width: 20%;">
		@isset($famous_man->image)
			<img src="{{ asset('storage/' . $famous_man->image) }}" class="card-img-top" alt="{{ $famous_man->name }}">
		@endisset
		<div class="card-body">
			<a href="{{route('man', $famous_man)}}"><h5 class="card-title">{{ $famous_man->name }}</h5></a>
			<p class="card-text">{!! substr($famous_man->info, 0, 150).'..' !!}</p>
		</div>
	</div>
	@endforeach
</div>
@endisset
@isset($famous_women)
<div class="d-flex flex-wrap row">
	@foreach ($famous_women as $famous_woman)
	<div class="card" style="width: 20%;">
		<img src="{{ asset('storage/' . $famous_woman->image) }}" class="card-img-top" alt="{{ $famous_woman->name }}">
		<div class="card-body">
			<a href="{{route('man', $famous_woman)}}"><h5 class="card-title">{{ $famous_woman->name }}</h5></a>
			<p class="card-text">{!! substr($famous_woman->info, 0, 100).'..' !!}</p>
		</div>
	</div>
	@endforeach
</div>
<span class="float-right">{{$famous_men->links()}}</span></div>
</div>
@endisset
@endsection