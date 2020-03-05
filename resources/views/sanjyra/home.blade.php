@extends('sanjyra.layouts.app')
@php
$active_man = $man;
if ($father->id == $active_man_id)
    $active_man = $father;
if (isset($active_woman_id))
    $active_woman = $active_man->kyzdary->find($active_woman_id);
@endphp
@section('title')
    @if (isset($active_woman))
        {{$active_man->name}} кызы {{$active_woman->name}}
    @else
        {{$father->name}}{{$active_man_id == $man->id ? ' уулу '.$man->name : ''}}
    @endif
@endsection
@section('content')
<div class="justify-content-center">
    @include('sanjyra.search.person_search')
</div>
<div class="justify-content-center">
    @include('sanjyra.partials.tree')
</div>
@endsection