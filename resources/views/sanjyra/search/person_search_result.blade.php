@extends('sanjyra.layouts.app')
@section('title', 'Издөөнүн жыйынтыгы - Кыргыз санжырасы')
@section('content')
<div class="justify-center pb-3 overflow-x-auto w-full">@include('sanjyra.search.person_search')
@php
	$i=1;
	$ress=count($men)+count($women);
@endphp
<small class="underline ml-2 text-sm">{{$ress}} жыйынтык табылды</small>
<div class="flex flex-wrap mt-1">
<div class="overflow-x-auto">
@if ($women != null)
<table class="border border-gray-800 m-1"><thead class="bg-gray-100">
<th class="border p-1 text-center border-gray-800">№</th>
<th class="border p-1 text-center border-gray-800">Чоң атасы</th>
<th class="border p-1 text-center border-gray-800">Атасы</th>
<th class="border p-1 text-center border-gray-800">Өзү</th>
<th class="border p-1 text-center border-gray-800">Уруусу</th>
</thead><tbody>
@foreach ($women as $woman)
<tr class="@if($i%2!==0)bg-white @else bg-red-100 @endif">
<td class="border p-1 text-center border-gray-800">{{$i++}}</td>
<td class="border p-1 text-center border-gray-800"><a class="text-blue-700 underline hover:text-blue-500 hover:no-underline" href="{{route('man', $woman->grand_id)}}">{{ $woman->grand_name }}</a></td>
<td class="border p-1 text-center border-gray-800"><a class="text-blue-700 underline hover:text-blue-500 hover:no-underline" href="{{route('man', $woman->father_id)}}">{{ $woman->father_name }}</a></td>
<td class="border p-1 text-center border-gray-800"><a class="text-blue-700 underline hover:text-blue-500 hover:no-underline" href="{{route('woman-show', $woman->id)}}">{{ $woman->name }}</a></td>
<td class="border p-1 text-center border-gray-800">{{ $woman->uruusu }}</td>
</tr>
@endforeach
</tbody></table>
@endif
</div><div class="overflow-x-auto">
@if ($men != null)
<table class="border border-gray-800 m-1"><thead class="bg-green-200">
<th class="border p-1 text-center border-gray-800">№</th>
<th class="border p-1 text-center border-gray-800">Чоң атасы</th>
<th class="border p-1 text-center border-gray-800">Атасы</th>
<th class="border p-1 text-center border-gray-800">Өзү</th>
<th class="border p-1 text-center border-gray-800">Уруусу</th>
</thead><tbody>
@foreach ($men as $man)
<tr class="@if($i%2!==0)bg-white @else bg-red-100 @endif">
<td class="border p-1 text-center border-gray-800">{{$i++}}</td>
<td class="border p-1 text-center border-gray-800"><a class="text-blue-700 underline hover:text-blue-500 hover:no-underline" href="{{route('man', $man->grand_id)}}">{{ $man->grand_name }}</a></td>
<td class="border p-1 text-center border-gray-800"><a class="text-blue-700 underline hover:text-blue-500 hover:no-underline" href="{{route('man', $man->father_id)}}">{{ $man->father_name }}</a></td>
<td class="border p-1 text-center border-gray-800"><a class="text-blue-700 underline hover:text-blue-500 hover:no-underline" href="{{route('man', $man->id)}}">{{ $man->name }}</a></td>
<td class="border p-1 text-center border-gray-800">{{ $man->uruusu }}</td>
</tr>
@endforeach
</tbody></table>
@elseif ($women == null)
<ul><li>Аты: {{$name}}</li><li>Атасынын аты: {{$father_name}}</li></ul>
<p>Мындай маалымат табылган жок.</p>
@endif
</div></div></div>
@endsection