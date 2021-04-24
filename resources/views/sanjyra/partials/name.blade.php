<div class="max-w-screen-md p-4">
<ul class=" list-inside list-disc">
	<span class="underline italic">Көп кездешкен ысымдар</span>
@foreach ($common_names as $common_name)
	<li class="list-group-item d-flex justify-content-between align-items-center">
		<span class="bg-blue-600 px-1 text-white rounded-md">{{$common_name->number_of_name}}</span>
		<span class="ml-2">
		@if($common_name->description != '')
			<a class="text-blue-500 underline" href="{{route('name', $common_name->name)}}">{{$common_name->name}}</a>
		@else
			{{$common_name->name}}
		@endif
		</span>
	</li>
@endforeach
</ul>
@php $paginator = $common_names; @endphp
@include('vendor.pagination.custom-tailwind')
<span style="font-size:0.8em">* Статистикалык маалымат биздин базага гана тийиштүү</span>
</div>