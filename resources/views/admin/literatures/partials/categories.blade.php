@foreach ($categories as $category)
    <option value="{{$category->id}}" 
        @isset($literature->id)
            @foreach ($literature->categories as $category_literature)
                @if ($category->id == $category_literature->id)
                    selected="selected"
                @endif
            @endforeach
        @endisset
        >
        {{$delimiter}}{{$category->title}}
    </option>
    @if (count($category->children) > 0)
        @include('admin.literatures.partials.categories', [
            'categories' => $category->children,
            'delimiter'  => ' - ' . $delimiter
        ])
    @endif
@endforeach