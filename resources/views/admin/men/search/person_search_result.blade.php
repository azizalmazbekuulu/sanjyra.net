@extends('sanjyra.layouts.app')

@section('title', 'Издөө')

@section('content')
<div class="justify-content-center pb-3">
	@include('sanjyra.search.person_search')
</div>
@php
	$i=1;
@endphp
<div class="row">
	<div class="col sm-6">
	@if ($women != null)
	<table>
		<thead>
			<th><div>№</div></th>
			<th><div>Чоң атасы</div></th>
			<th><div>Атасы</div></th>
			<th><div>Өзү</div></th>
			<th><div>Уруусу</div></th>
		</thead>
		<tbody>
		@forelse ($women as $woman)
		<tr>
			<td>{{$i++}}</td>
			<td><a href="{{ url('admin/man') . '/'  . $woman->grand_id . '/edit' }}">{{ $woman->grand_name }}</a></td>
			<td><a href="{{ url('admin/man') . '/'  . $woman->father_id . '/edit' }}">{{ $woman->father_name }}</a></td>
			<td><a href="{{ url('admin/woman') . '/'  . $woman->id . '/edit' }}">{{ $woman->name }}</a></td>
			<td>{{ $woman->uruusu }}</td>
		</tr>
		@empty
			<tr>
				<td colspan="3" class="text-center">Макалалар жок</td>
			</tr>
		@endforelse
		</tbody>
		{{-- <tfoot>
			<tr>
				<td colspan="3">
					<ul class="pagination float-right">
						{{$men->links()}}
					</ul>
				</td>
			</tr>
		</tfoot> --}}
	</table>
	</div>
	@endif
<div class="col-sm-6">
@if ($men != null)
<table>
	<thead>
		<th><div>№</div></th>
		<th><div>Чоң атасы</div></th>
		<th><div>Атасы</div></th>
		<th><div>Өзү</div></th>
		<th><div>Уруусу</div></th>
	</thead>
	<tbody>
	@forelse ($men as $man)
	<tr>
		<td>{{$i++}}</td>
		<td><a href="{{ url('admin/man') . '/' . $man->grand_id . '/edit' }}">{{ $man->grand_name }}</a></td>
		<td><a href="{{ url('admin/man') . '/'  . $man->father_id . '/edit' }}">{{ $man->father_name }}</a></td>
		<td><a href="{{ url('admin/man') . '/'  . $man->id . '/edit' }}">{{ $man->name }}</a></td>
		<td>{{ $man->uruusu }}</td>
	</tr>
	@empty
		<tr>
			<td colspan="3" class="text-center">Макалалар жок</td>
		</tr>
	@endforelse
	</tbody>
	{{-- <tfoot>
		<tr>
			<td colspan="3">
				<ul class="pagination float-right">
					{{$men->links()}}
				</ul>
			</td>
		</tr>
	</tfoot> --}}
</table>
@endif
</div>
</div>
@endsection