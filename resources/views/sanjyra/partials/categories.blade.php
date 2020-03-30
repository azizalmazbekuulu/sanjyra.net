@foreach ($categories as $category)
<a href="{{route('person-search')}}">{{$category->title}}</a>
@endforeach