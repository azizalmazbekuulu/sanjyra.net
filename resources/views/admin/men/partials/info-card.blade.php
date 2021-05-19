
<div class="justify-content-center">
	@include('admin.men.partials.full_generation')
</div>
<div class="card my-3">
	<div class="card-header">
		@if ($father->id != $active_man->id)
		{{$father->name}} уулу {{$active_man->name}}
		@else
		{{$active_man->name}}
		@endif
	</div>
	<div class="card-body">
		<dl class="row">
			@if ($active_man->uruusu != '')
			<dt class="col-sm-3">Уруусу</dt>
			<dd class="col-sm-9">{{$active_man->uruusu}}</dd>
			@endif
			@if ($active_man->mother_name != '' || $active_man->mother_id != 0)
			<dt class="col-sm-3">Энеси</dt>
			<dd class="col-sm-9">
				@if ($active_man->mother_id != 0 && App\Http\Controllers\SanjyraController::is_sanjyra_woman($active_man->mother_id))
				<a href="{{route('admin.woman.edit', $active_man->mother)}}">
					{{$active_man->mother->name}}
				</a>
				@else
				{{$active_man->mother_name}}
				@endif
			</dd>
			@endif
			@if ($active_man->kyzdary->first() != null)
			<dt class="col-sm-3">Кыздары</dt>
			<dd class="col-sm-9">
				@foreach ($active_man->kyzdary as $kyzy)
				<a class="btn font-weight-bold border border-dark 
							@if (isset($active_woman) && $kyzy->id == $active_woman->id)
									bg-success text-danger
							@else
									bg-primary text-white
							@endif
							" href="{{route('admin.woman.edit', $kyzy)}}">
					{{ $kyzy->name }}
				</a>
				@endforeach
				@isset($active_woman)
				<div class="card">
					<div class="card-body">
						<h6 class="card-header">{{$active_man->name}} кызы {{$active_woman->name}}</h6>
						<dl class="row pt-2">
							@if ($active_woman->mother_name != '' || $active_woman->mother_id != 0)
							<dt class="col-sm-3">Энеси</dt>
							<dd class="col-sm-9">
								@if ($active_woman->mother_id != 0 && App\Http\Controllers\SanjyraController::is_sanjyra_woman($active_woman->mother_id))
								<a href="{{route('admin.woman.edit', $active_woman->mother)}}">
									{{$active_woman->mother->name}}
								</a>
								@else
								{{$active_woman->mother_name}}
								@endif
							</dd>
							@endif
							@if ($active_woman->uuldary->first() != null)
							<dt class="col-sm-2">Уулдары</dt>
							<dd class="col-sm-10">
								@foreach ($active_woman->uuldary as $uulu)
								<a class="btn font-weight-bold border border-dark bg-primary text-white"
									href="{{route('admin.man.edit', $uulu)}}">
									{{ $uulu->name }}
								</a>
								@endforeach
							</dd>
							@endif
							@if ($active_woman->kyzdary->first() != null)
							<dt class="col-sm-2">Кыздары</dt>
							<dd class="col-sm-10">
								@foreach ($active_woman->kyzdary as $kyzy)
								<a class="btn font-weight-bold border border-dark bg-primary text-white"
									href="{{route('admin.woman.edit', $kyzy->id)}}">
									{{ $kyzy->name }}
								</a>
								@endforeach
							</dd>
							@endif
							@if ($active_woman->categories()->first() != null)
							<dt class="col-sm-3">Тегдер</dt>
							<dd class="list-group-item-text col-sm-9">
								{{$active_woman->categories()->pluck('title')->implode(', ')}}
							</dd>
							@endif
							@if ($active_woman->info != '' || $active_woman->image != '')
							<dt class="col-sm-3">Маалымат</dt>
							<dd class="col-sm-9">
								@if ($active_woman->image != '')
								<img width="200px" src="{{ asset('storage/'. $active_woman->image) }}"
									alt="{{$active_woman->name}}">
								@endif
								{!! $active_woman->info !!}</dd>
							@endif
						</dl>
					</div>
				</div>
				@endisset
			</dd>
			@endif
			@if ($active_man->categories()->first() != null)
			<dt class="col-sm-3">Тегдер</dt>
			<dd class="list-group-item-text col-sm-9">
				{{$active_man->categories()->pluck('title')->implode(', ')}}
			</dd>
			@endif
			@if (($active_man->image != '' || $active_man->info != '') && !isset($active_woman))
			<dt class="col-sm-3">Маалымат</dt>
			<dd class="col-sm-9">
				@if ($active_man->image != '')
				<img width="200px" src="{{ asset('storage/' . $active_man->image) }}" alt="{{$active_man->name}}">
				@endif
				{!! $active_man->info !!}</dd>
			@endif
		</dl>
	</div>
</div>