@extends('sanjyra.layouts.app')
@section('title', 'Издөөнүн жыйынтыгы - Кыргыз санжырасы')
@section('content')
<div class="justify-content-center pb-3">@include('sanjyra.search.person_search')</div>
@if ($men != null)
<dl class="p-1">
@foreach ($men as $man)
<dt class="pt-1"><a href="{{route('man', $man->id)}}">{{ $man->name }}</a></dt>
<dd class="pb-1">{!! mb_substr($man->info, 0, 300) !!}...</dd>
@endforeach
@endif
@if ($women != null)
@foreach ($women as $woman)
<dt class="pt-1"><a href="{{route('woman-show', $woman->id)}}">{{ $woman->name }}</a></dt>
<dd class="pb-1">{!! mb_substr($woman->info, 0, 300) !!}...</dd>
@endforeach
@endif
@if ($articles != null)
@foreach ($articles as $article)
<dt class="pt-1"><a href="{{route('article', $article->id)}}">{{ $article->title }}</a></dt>
<dd class="pb-1">{!! $article->description_short !!}</dd>
@endforeach
@endif
</dl>
@if(null == $articles && null == $men && null == $women)<p>{{ $query }} - мындай маалымат табылган жок. Өзгөртүп издеп көрүңүз.</p>@endif
@endsection