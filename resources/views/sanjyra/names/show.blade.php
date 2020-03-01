@extends('sanjyra.layouts.app')
@section('content')
@if($active_name != null)
    <dl class="row">
        <dt class="col-sm-4">
            <a href="{{route('name')}}">
                <h4>{{$active_name->name}}</h4>
            </a>
        </dt>
        <dd class="col-sm-8">
            <p>{!! $active_name->description !!}</p>
        </dd>
    </dl>
@endif
<div class="row p-3">
    @include('sanjyra.partials.name')
</div>
@endsection