@extends('sanjyra.layouts.app')
@php
$active_man = $man;
if ($father->id == $active_man_id)
	$active_man = $father;
if (isset($active_woman_id))
	$active_woman = $active_man->kyzdary->find($active_woman_id);
@endphp
@section('title')
	@if (Route::currentRouteName() === 'index')
		{{ config('app.name', 'Кыргыз санжырасы') }}
	@elseif (isset($active_woman))
		{{$active_man->name}} кызы {{$active_woman->name}}
	@else 
		{{$father->name}}{{$active_man_id == $man->id ? ' уулу '.$man->name : ''}}
	@endif
@endsection
@section('content')
<div>@include('sanjyra.search.person_search')</div>
<hr class="sm:mb-1">
<div class="container mx-auto w-full">
	@include('sanjyra.partials.tree')
	<div class="border rounded-md border-yellow-400 my-1 bg-gray-100 p-2">
		@include('sanjyra.partials.full_generation')
	</div>
	@include('sanjyra.partials.info-card')
</div>
<div class="mt-3">
@include('sanjyra.partials.social_share')
</div>
@endsection