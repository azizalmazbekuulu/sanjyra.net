@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Макалаларды оңдоо @endslot
            @slot('parent') Башкы бет @endslot
            @slot('active') Макалалар @endslot
        @endcomponent
        <hr>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$article->title}}</h5>
                @if ($article->image != null)
                    <img width="300px" src="{{ asset('storage/'.$article->image) }}" alt="{{$article->name}}">
                @endif
                <p class="card-text">
                    {!! $article->description !!}
                </p>
            </div>
        </div>
    </div>
@endsection