<div class="container mx-auto bg-gray-100 rounded-2xl border border-red-500 w-full">
	<div class="bg-white w-full p-2 md:p-4 rounded-t-2xl font-bold border-b border-red-400">
		@if ($father->id != $active_man->id){{$father->name}} уулу {{$active_man->name}}
		@else{{$active_man->name}}@endif
	</div>
	<div class="p-2 md:p-4">
		<dl class="flex">
			@if ($active_man->uruusu != '')
			<dt class="pr-9 italic underline">Уруусу:</dt>
			<dd>{{$active_man->uruusu}}</dd>
			@endif
        </dl>
        <dl class="flex">
			@if ($active_man->mother_name != '' || $active_man->mother_id != 0)
			<dt class="pr-10 italic underline">Энеси:</dt>
			<dd">
				@if ($active_man->mother_id != 0 && App\Http\Controllers\SanjyraController::is_sanjyra_woman($active_man->mother_id))
				<a class="text-blue-600 underline hover:no-underline hover:text-blue-500" href="{{route('woman-show', $active_man->mother)}}">
					{{$active_man->mother->name}}
				</a>
				@else
				{{$active_man->mother_name}}
				@endif
			</dd>
			@endif
        </dl>
			@if ($active_man->kyzdary->first() != null)
        <dl class="flex mt-1 flex-wrap">
			<dt class="pr-4 italic underline">Кыздары:</dt>
			<dd>
				@foreach ($active_man->kyzdary as $kyzy)
                <span class="mr-2 max-w-max w-max">
                    <x-woman-link :href="route('woman-show', $kyzy)" :active="isset($active_woman) && $active_woman->id == $kyzy->id">
                        {{ $kyzy->name }}
                    </x-woman-link>
                </span>
				@endforeach
				@isset($active_woman)
				    <div class="container mx-auto bg-gray-100 rounded-b-2xl border border-red-500">
						<h6 class="bg-white w-full py-2 md:py-4 px-6 rounded-t-2xl font-bold border-b border-red-400">{{$active_man->name}} кызы {{$active_woman->name}}</h6>
						@if ($active_woman->mother_name != '' || $active_woman->mother_id != 0)
						<dl class="p-2 sm:p-4 flex">
							<dt class="pr-7 italic underline">Энеси:</dt>
							<dd>
								@if ($active_woman->mother_id != 0 && App\Http\Controllers\SanjyraController::is_sanjyra_woman($active_woman->mother_id))
								<a href="{{route('woman-show', $active_woman->mother)}}">
									{{$active_woman->mother->name}}
								</a>
								@else
								{{$active_woman->mother_name}}
								@endif
							</dd>
                        </dl>
							@endif
							@if ($active_woman->uuldary->first() != null)
                            <hr>
                        <dl class="flex p-2 sm:p-4">
							<dt class="pr-4 italic underline">Уулдары:</dt>
							<dd>
								@foreach ($active_woman->uuldary as $uulu)
								<a class="inline-block py-1 px-3 w-full h-full bg-blue-600 border border-gray-900 font-bold text-white hover:bg-blue-300 hover:text-red-500 rounded-2xl text-center max-w-max leading-4 max-h-7 mb-2" href="{{route('man', $uulu->id)}}">
									{{ $uulu->name }}
								</a>
								@endforeach
							</dd>
                        </dl>
							@endif
							@if ($active_woman->kyzdary->first() != null)
                            <hr>
                        <dl class="flex p-2 sm:p-4">
							<dt class="pr-4 italic underline">Кыздары:</dt>
							<dd>
								@foreach ($active_woman->kyzdary as $kyzy)
								<a class="inline-block py-1 px-3 w-full h-full bg-blue-600 border border-gray-900 font-bold text-white hover:bg-blue-300 hover:text-red-500 rounded-2xl text-center max-w-max leading-4 max-h-7 mb-2" href="{{route('woman-show', $kyzy->id)}}">
									{{ $kyzy->name }}
								</a>
								@endforeach
							</dd>
                        </dl>
							@endif
							@if ($active_woman->info != '' || $active_woman->image != '')
                        <dl class="flex p-2 sm:p-4">
							<dt class="pr-3 italic underline">Маалымат:</dt>
							<dd>
								@if ($active_woman->image != '')
								<img class="m-3" width="200px" src="{{ asset('storage/'. $active_woman->image) }}" alt="{{$active_woman->name}}">
								@endif
								{!! $active_woman->info ?? '' !!}
							</dd>
                        </dl>
							@endif
					</div>
				@endisset
			</dd>
        </dl>@endif
			@if ($active_man->image != '' || $active_man->info != '')
        <dl class="flex flex-wrap mt-2 max-w-full">
			<dt class="pr-2 italic underline">Маалымат:</dt>
			<dd class=" text-justify">
				@if ($active_man->image != '')
				<img class="m-3" width="200px" src="{{ asset('storage/' . $active_man->image) }}" alt="{{$active_man->name}}">
				@endif
				{!! $active_man->info ?? '' !!}
			</dd>
		</dl>
			@endif
	</div>
</div>