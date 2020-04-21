@extends('admin.layouts.app_admin')
@section('content')
<div class="container">
@component('admin.components.breadcrumb')
@slot('title') Ысымдардын тизмеси @endslot
@slot('parent') Башкы бет @endslot
@slot('active') Ысымдар @endslot
@endcomponent
<hr>
@include('admin.names.partials.name_search')
<a href="{{route('admin.name.create')}}" class="btn btn-primary float-right"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Ысым түзүү</a>
@if (isset($query))
<table class="table table-striped">
<thead>
<tr>
	<th>Ысым</th>
	<th>Аял - Эркек</th>
	<th class="text-right">Аракет</th>
</tr>
</thead>
<tbody>
@foreach ($names as $name)
<tr>
	<td>{{$name->name}}</td>
	<td>@if($name->male_female)Эркек ысымы@else Аял ысымы@endif</td>
	<td class="text-right">
		<form onsubmit="if(confirm('Өчүрүү керекпи?')){ return true }else{ return false }" action="{{route('admin.name.destroy', $name)}}" method="post">
			<input type="hidden" name="_method" value="DELETE">
			{{ csrf_field() }}
			<a class="btn btn-default" href="{{ route('admin.name.edit', $name) }}"><i class="fas fa-edit"></i></a>
			<button type="submit" class="btn"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
		</form>
	</td>
</tr>
@endforeach
</tbody>
</table>
@empty($names)
<p>{{$query}} - мындай ысым табылган жок.</p>
@endempty
@endif
</div>
@endsection