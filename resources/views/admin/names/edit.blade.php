@extends('admin.layouts.app_admin')
@section('content')
<div class="container">
	@component('admin.components.breadcrumb')
		@slot('title') Ысымдарды оңдоо @endslot
		@slot('parent') Башкы бет @endslot
		@slot('active') Ысымдар @endslot
	@endcomponent
	<hr>
	<form action="{{route('admin.name.update', $name)}}" method="post">
		@method('put')@csrf
		@include('admin.names.partials.form')
		<input type="hidden" name="modified_by" value="{{Auth::id()}}">
	</form>
</div>
@endsection