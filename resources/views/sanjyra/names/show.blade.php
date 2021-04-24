@extends('sanjyra.layouts.app')
@section('title', 'Ысымдар')
@section('content')
<div class="p-4 max-w-screen-md mx-auto">
@include('sanjyra.search.name_search')
@if($active_name != null)
<div class="container mx-auto my-2">
<table>
	<thead>
		<tr>
			<th class="border border-black px-2" scope="col">Ысым</th>
			<th class="border border-black px-2" scope="col">Кездешүү саны</th>
			<th class="border border-black px-2" scope="col">Аныктама</th>
		</tr>
	</thead>
	<tbody class="text-center">
		<tr><td class="border border-black px-2">{{$active_name->name}}</td><td class="border border-black px-2">{{$active_name->number_of_name}}</td><td class="border border-black px-2" style="white-space:normal;">{!!$active_name->description!!}</td></tr>
	</tbody>
</table>
</div>
@elseif ($name !== null)
<p class="m-4">{{ $name }} - мындай ысым табылган жок.</p>
@endif
<div class="p-3">
	@include('sanjyra.partials.name')
</div>
</div>
@endsection