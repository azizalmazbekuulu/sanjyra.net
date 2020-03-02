@extends('sanjyra.layouts.app')

@section('content')
<div class="justify-content-center pb-3">
    @include('sanjyra.search.person_search')
</div>
@php
    $i=1;
@endphp
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
        <td><a href="{{route('man', $man->grand_id)}}">{{ $man->grand_name }}</a></td>
        <td><a href="{{route('man', $man->father_id)}}">{{ $man->father_name }}</a></td>
        <td><a href="{{route('man', $man->id)}}">{{ $man->name }}</a></td>
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
@endsection