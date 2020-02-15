@foreach ($categories as $category)
    <option value="{{$category->id}}" 
        @isset($man->id)
            @foreach ($man->categories as $category_man)
                @if ($category->id == $category_man->id)
                    selected="selected"
                @endif
            @endforeach
        @endisset
        >
        {{$delimiter}}{{$category->title}}
    </option>
    @if (count($category->children) > 0)
        @include('admin.articles.partials.categories', [
            'categories' => $category->children,
            'delimiter'  => ' - ' . $delimiter
        ])
    @endif
@endforeach