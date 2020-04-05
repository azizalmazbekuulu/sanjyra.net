@foreach ($categories as $category)
<a href="{{route('person-search')}}">{{$category->title}}</a>@if ($category == $categories->last()) @else,&nbsp; @endif
@endforeach