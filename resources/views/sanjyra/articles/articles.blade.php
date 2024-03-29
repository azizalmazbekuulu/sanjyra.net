@extends('sanjyra.layouts.app')
@section('title', 'Макалалар')
@section('content')
<div class="max-w-screen-md mx-auto m-3">
    @if ($active_article != null)
    <div class="container text-center pt-3">
        <h5 class=" text-lg">{!!$active_article->title!!}</h5>
        <div>@if ($active_article->image != '')
            <img class="m-3 w-100" src="{{ asset('storage/' . $active_article->image) }}" alt="{{$active_article->title}}">
            @endif{!!$active_article->description!!}
            <br>
            @include('sanjyra.partials.social_share')
        </div>
    </div>
    @elseif ($articles != null)
    @foreach ($articles as $article)
    <div class="m-3 p-3">
        <a class="text-blue-600 underline" href="{{route('article', $article->slug)}}">
            <h5>{!!$article->title!!}</h5>
        </a>
        <div>{!!$article->description_short!!}</div>
    </div>
    @endforeach
    @endif
</div>
@endsection