@foreach ($categories as $category)
	<option value="{{$category->id}}"
		@foreach ($active_person->categories as $category_man)
				@if ($category->id == $category_man->id)
						selected="selected"
				@endif
		@endforeach
	>
		{{$delimiter}}{{$category->title}}
	</option>
	@if (count($category->children) > 0)
		@include('admin.men.partials.categories', [
			'categories' => $category->children,
			'delimiter'  => ' - ' . $delimiter
		])
	@endif
@endforeach