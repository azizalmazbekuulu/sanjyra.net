@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Колднулган адабияттарды оңдоо @endslot
            @slot('parent') Башкы бет @endslot
            @slot('active') Колднулган адабияттар @endslot
        @endcomponent
        <hr>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$literature->title}}</h5>
                <h5 class="card-title">{{$literature->author}}</h5>
                @if ($literature->image != '')
                    <img src="{{ asset('storage/'.$literature->image) }}" alt="{{$literature->title}}">
                @endif
                <p class="card-text">
                    {!! $literature->description !!}
                </p>
            </div>
        </div>
    </div>
@endsection