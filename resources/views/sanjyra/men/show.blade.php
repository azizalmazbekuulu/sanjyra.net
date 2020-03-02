@extends('sanjyra.layouts.app')
@php
$active_man = $man;
if ($father->id == $active_man_id)
    $active_man = $father;
if (isset($active_woman_id))
    $active_woman = $active_man->kyzdary->find($active_woman_id);
@endphp
@section('content')
<div class="justify-content-center">
    @include('sanjyra.search.person_search')
</div>
    @include('sanjyra.partials.tree')
@endsection