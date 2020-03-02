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
<div class="justify-content-center">
    @include('sanjyra.partials.tree')
</div>
<div class="justify-content-center p-3">
    @include('sanjyra.partials.famous_people')
</div>
<div class="row p-3">
    @include('sanjyra.partials.name')
</div>
@endsection