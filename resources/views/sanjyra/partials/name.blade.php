<div class="col-sm-6">
<ul class="list-group w-100">
	<span class="list-group-item">Көп кездешкен ысымдар</span>
@foreach ($common_names as $common_name)
	<li class="list-group-item d-flex justify-content-between align-items-center">
		<a href="{{route('name', $common_name->name)}}">{{$common_name->name}}
		</a>
		<span class="badge badge-primary badge-pill">{{$common_name->number_of_name}}</span>
	</li>
@endforeach
</ul>
<span class="float-right">{{$common_names->links()}}</span>
</div>