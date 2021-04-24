@extends('sanjyra.layouts.app')
@section('title', 'Издөөнүн жыйынтыгы - Кыргыз санжырасы')
@section('content')
<div class="justify-center pb-3 max-w-screen-md mx-auto">@include('sanjyra.search.person_search')
<dl class="p-1">
@if ($articles != null)
@foreach ($articles as $article)
<dt class="pt-1"><a class="text-blue-600 underline hover:no-underline hover:text-blue-400" href="{{route('article', $article->id)}}">{{ $article->title }}</a></dt>
<dd class="pb-1">{!! $article->description_short !!}</dd>
@endforeach
@endif
@if ($men != null)
@foreach ($men as $man)
<dt class="pt-1"><a class="text-blue-600 underline hover:no-underline hover:text-blue-400" href="{{route('man', $man->id)}}">{{ $man->name }}</a></dt>
<dd class="pb-1">{!! mb_substr($man->info, 0, 150) !!}...</dd>
@endforeach
@endif
@if ($women != null)
@foreach ($women as $woman)
<dt class="pt-1"><a class="text-blue-600 underline hover:no-underline hover:text-blue-400" href="{{route('woman-show', $woman->id)}}">{{ $woman->name }}</a></dt>
<dd class="pb-1">{!! mb_substr($woman->info, 0, 150) !!}...</dd>
@endforeach
@endif
</dl>
@if(null == $articles && null == $men && null == $women)<p>{{ $query }} - мындай маалымат табылган жок. Өзгөртүп издеп көрүңүз.</p>@endif
</div>
@endsection