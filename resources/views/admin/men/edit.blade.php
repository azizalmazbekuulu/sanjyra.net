@extends('admin.layouts.app_admin')
@section('content')
<div class="container">
	@component('admin.components.breadcrumb')
		@slot('title') Адамдарды оңдоо @endslot
		@slot('parent') Башкы бет @endslot
		@slot('active') Адамдар @endslot
	@endcomponent
	<hr>
	@php
		$active_man = $man;
		if ($father->id == $active_man_id)
			$active_man = $father;
	@endphp
	<div class="row">
		<div class="col border border-dark rounded justify-content-between m-1">
			@include('admin.men.partials.create')
			<hr>
			<button data-toggle="collapse" data-target="#changeinfo" class="btn btn-warning border border-danger m-2">Маалыматтарды өзгөртүү</button>
			<div id="changeinfo" class="collapse">
			<form enctype="multipart/form-data" method="post"
			@if (isset($active_woman))
				action="{{route('admin.woman.update', $active_woman)}}"
			@else
				action="{{route('admin.man.update', $active_man)}}"
			@endif>
				<input type="hidden" name="_method" value="put">
				@csrf
				@include('admin.men.partials.form')
				<input type="hidden" name="modified_by" value="{{Auth::id()}}">
			</form>
			@include('admin.men.partials.image_delete_form')
			</div>
		</div>
		<div class="col justify-content-center border border-dark rounded m-1" style="padding: 30px;">
			@include('admin.men.search.person_search')
			@include('admin.men.partials.tree')
		</div>
	</div>
	<hr>
</div>
@endsection