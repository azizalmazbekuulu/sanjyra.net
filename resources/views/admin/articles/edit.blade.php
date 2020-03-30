@extends('admin.layouts.app_admin')
@section('content')
<div class="container">
	@component('admin.components.breadcrumb')
		@slot('title') Макалаларды оңдоо @endslot
		@slot('parent') Башкы бет @endslot
		@slot('active') Макалалар @endslot
	@endcomponent
	<hr>
	<form action="{{route('admin.article.update', $article)}}" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="put">
		{{ csrf_field() }}
		@include('admin.articles.partials.form')
		<input type="hidden" name="modified_by" value="{{Auth::id()}}">
	</form>
	@if ($article->image != null)
	@include('admin.articles.partials.image_delete_form')
	@endif
</div>
@endsection