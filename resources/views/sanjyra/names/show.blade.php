@extends('sanjyra.layouts.app')
@section('content')
@include('sanjyra.search.name_search')
@if($active_name != null)
<div class="container py-3">
<table class="table table-sm table-bordered" style="width: auto;">
	<thead class="thead-light">
		<tr>
			<th scope="col">Ысым</th>
			<th scope="col">Кездешүү саны</th>
			<th scope="col">Аныктама</th>
		</tr>
	</thead>
	<tbody class="text-center">
		<tr><td>{{$active_name->name}}</td><td>{{$active_name->number_of_name}}</td><td>{!!$active_name->description!!}</td></tr>
	</tbody>
</table>
</div>
@elseif ($name !== null)
<p>{{ $name }} - мындай ысым табылган жок.</p>
@endif
<div class="row p-3">
	@include('sanjyra.partials.name')
</div>
@endsection