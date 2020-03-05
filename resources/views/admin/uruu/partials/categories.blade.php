@foreach ($categories as $category)
    <option value="{{$category->id}}" 
        @isset($uruu->id)
            @foreach ($uruu->categories as $category_uruu)
                @if ($category->id == $category_uruu->id)
                    selected="selected"
                @endif
            @endforeach
        @endisset
        >
        {{$delimiter}}{{$category->title}}
    </option>
    @if (count($category->children) > 0)
        @include('admin.uruu.partials.categories', [
            'categories' => $category->children,
            'delimiter'  => ' - ' . $delimiter
        ])
    @endif
@endforeach