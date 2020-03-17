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
            <td><a href="{{route('man', $woman->grand_id)}}">{{ $woman->grand_name }}</a></td>
            <td><a href="{{route('man', $woman->father_id)}}">{{ $woman->father_name }}</a></td>
            <td><a href="{{route('woman-show', $woman->id)}}">{{ $woman->name }}</a></td>
            <td>{{ $woman->uruusu }}</td>
        </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">Макалалар жок</td>
            </tr>
        @endforelse
        </tbody>
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
    </table>
    @elseif ($women == null)
    <ul>
        <li>Аты: {{$name}}</li>
        <li>Атасынын аты: {{$father_name}}</li>
    </ul>
    <p>Мындай маалымат табылган жок. Маалыматтын тууралыгын текшериңиз.</p>
    @endif
    </div>
</div>
@endsection