@extends('sanjyra.layouts.app')

@section('title', 'Издөө')

@section('content')
<div class="justify-content-center pb-3">
    @include('sanjyra.search.person_search')
</div>
@if ($men != null)
<dl class="p-1">
    @foreach ($men as $man)
        <dt class="pt-1"><a href="{{route('man', $man->id)}}">{{ $man->name }}</a></dt>
        <dd class="pb-1">{!! mb_substr($man->info, 0, 300) !!}...</dd>
    @endforeach
</dl>
@elseif ($women != null)
<dl>
    @foreach ($women as $woman)
        <dt class="pt-1"><a href="{{route('woman-show', $woman->id)}}">{{ $woman->name }}</a></dt>
        <dd class="pb-1">{!! mb_substr($woman->info, 0, 300) !!}...</dd>
    @endforeach
</dl>
@elseif ($articles != null)
<dl class="p-1">
    @foreach ($articles as $article)
        <dt class="pt-1"><a href="{{route('article', $article->id)}}">{{ $article->title }}</a></dt>
        <dd class="pb-1">{!! $article->description_short !!}</dd>
    @endforeach
</dl>
@else
<p>{{ $query }} - мындай маалымат табылган жок. Өзгөртүп издеп көрүңүз.</p>
@endif
@endsection