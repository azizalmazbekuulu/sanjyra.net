<div class="container py-3" style="overflow: auto;">
	<table class="tree">
		<tbody>
			@php
			if ($father->bala_sany - $man->kanchanchy_bala > $man->bala_sany) {
			$count = $father->bala_sany;
			}
			elseif ($man->bala_sany > 0 && $man->kanchanchy_bala == $man->children->first()->kanchanchy_bala) {
			$count = ($father->bala_sany > $man->bala_sany ? $father->bala_sany : $man->bala_sany);
			}
			else {
			$count = $father->bala_sany + $man->bala_sany;
			}
			@endphp
			@for ($i = 1; $i <= $count; $i++) <tr>
				@if ($i == 1)
				<td>
					<a class="btn text-nowrap font-weight-bold border border-dark rounded-pill
						@if ($father->id == $active_man_id)
								bg-success text-danger
						@else
								bg-primary text-white
						@endif
						w-100 h-100" href="{{route('admin.man.edit', $father->id)}}">
						{{ $father->name }}
					</a>
				</td>
				<td>
					<svg height="20" width="40">
						<line x1="0" y1="10" x2="40" y2="10" style="stroke:rgb(0,0,0);stroke-width:2" />
						Балдары:
					</svg>
				</td>
				@else
				<td></td><td></td>
				@endif
				@if ($i <= $father->bala_sany && $father->children->where('kanchanchy_bala', $i)->first() != null)
					<td>
					<div class="container">
					<div class="row flex-nowrap">
							<a class="btn text-nowrap font-weight-bold border border-dark rounded-pill
								@if ($father->children->where('kanchanchy_bala', $i)->first()->id == $active_man_id)
									bg-success text-danger
								@else
									bg-primary text-white
								@endif
								w-100 h-100" href="{{route('admin.man.edit', $father->children->where('kanchanchy_bala', $i)->first()->id)}}">
								{{ $father->children->where('kanchanchy_bala', $i)->first()->name }}
							</a>
							@if($father->bala_sany > 1)
								@if ($i != 1)
								@php
								$upid = $father->children->where('kanchanchy_bala', $i)->first()->id;
								$downid = $father->children->where('kanchanchy_bala', $i-1)->first()->id;
								@endphp
							<!-- Up Button -->
							<div class="p-0 text-center">
							<form action="{{route('admin.man.up')}}" method="post">
								@csrf
								<input type="hidden" name="upid" value="<?=$upid?>">
								<input type="hidden" name="upnum" value="<?=($i-1)?>">
								<input type="hidden" name="downid" value="<?=$downid?>">
								<input type="hidden" name="downnum" value="<?=($i)?>">
								<input class="change-button" type="submit" name="submit" value="&#8673;" >
							</form></div>
								@endif
							@endif
					</div></div>
					</td>
					@if ($father->children->where('kanchanchy_bala', $i)->first()->id == $man->id && $man->bala_sany >
					0)
					<td>
						<svg height="20" width="40">
							<line x1="0" y1="10" x2="40" y2="10" style="stroke:rgb(0,0,0);stroke-width:2" />
							Балдары:
						</svg>
					</td>
					@else
					<td></td>
					@endif
				@else
				<td></td><td></td>
				@endif
				@if ($i >= $man->kanchanchy_bala && $i < $man->bala_sany + $man->kanchanchy_bala)
					<td>
						@php
						$order = $i-$man->kanchanchy_bala+1;
						@endphp
						@if ($man->children->where('kanchanchy_bala', $order)->first() != null)
						<div class="container">
						<div class="row flex-nowrap">
							<a class="btn text-nowrap font-weight-bold border border-dark rounded-pill bg-primary text-white w-100 h-100"
								href="{{route('admin.man.edit', $man->children->where('kanchanchy_bala', $order)->first()->id)}}">
								{{ $man->children->where('kanchanchy_bala', $order)->first()->name }}
							</a>
							@if($man->bala_sany > 1)
								@if ($order != 1)
								@php
								$upid = $man->children->where('kanchanchy_bala', $order)->first()->id;
								$downid = $man->children->where('kanchanchy_bala', $order-1)->first()->id;
								@endphp
							<!-- Up Button nebere -->
							<div class="p-0 text-center">
							<form action="{{route('admin.man.up')}}" method="post">
								@csrf
								<input type="hidden" name="upid" value="<?=$upid?>">
								<input type="hidden" name="upnum" value="<?=($order-1)?>">
								<input type="hidden" name="downid" value="<?=$downid?>">
								<input type="hidden" name="downnum" value="<?=($order)?>">
								<button type="submit" name="submit" class="change-button">&#8673;</button>
							</form></div>
								@endif
							@endif
						</div></div>
						@endif
					</td>
				@endif
			</tr>
			@endfor
		</tbody>
	</table>
</div>
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
				@if ($active_man->mother_id != 0)
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
								@if ($active_woman->mother_id != 0)
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