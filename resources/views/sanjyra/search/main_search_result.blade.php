@extends('sanjyra.layouts.app')

@section('title', 'Издөө')

@section('content')
<div class="justify-content-center pb-3">
    @include('sanjyra.search.person_search')
</div>
@if ($men != null)
<dl>
    @foreach ($men as $man)
        <dt><a href="{{route('man', $man->id)}}">{{ $man->name }}</a></dt>
        <dd>{!! mb_substr($man->info, 0, 200) !!}</dd>
    @endforeach
</dl>
@elseif ($women != null)
<dl>
    @foreach ($women as $woman)
        <dt><a href="{{route('woman-show', $woman->id)}}">{{ $woman->name }}</a></dt>
        <dd>{!! mb_substr($woman->info, 0, 200) !!}</dd>
    @endforeach
</dl>
@elseif ($articles != null)
<dl>
    @foreach ($articles as $article)
        <dt><a href="{{route('woman-show', $article->id)}}">{{ $article->title }}</a></dt>
        <dd>{!! mb_substr($article->description, 0, 200) !!}</dd>
    @endforeach
</dl>
@else
<p>{{ $query }} - мындай маалымат табылган жок. Өзгөртүп издеп көрүңүз.</p>
@endif
@endsection