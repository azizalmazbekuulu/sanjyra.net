<div class="container py-3" style="overflow: auto;">
	<div class="row flex flex-nowrap">
		<table class="tree">
			<tr>
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
			</tr>
		</table>
		<table class="tree">
		@php
			$i = 1;
			$children = $father->children
		@endphp
		@foreach($children as $key => $child)
			<tr>
				<td>
					<div class="container">
					<div class="row flex-nowrap">
						<a class="btn text-nowrap font-weight-bold border border-dark rounded-pill
							@if ($child->id == $active_man_id)
								bg-success text-danger
							@else
								bg-primary text-white
							@endif
							w-100 h-100" href="{{route('admin.man.edit', $child->id)}}">
							{{ $child->name }}
						</a>
						@if($father->bala_sany > 1)
							@if ($i != 1)
								@php
									$upid = $child->id;
									$downid = $children[$key - 1];
									$downid = $downid->id;
								@endphp
								<!-- Up Button -->
								<div class="p-0 text-center">
									<form action="{{route('admin.man.up')}}" method="post">
										@csrf
										<input type="hidden" name="upid" value="{{ $upid }}">
										<input type="hidden" name="downid" value="{{ $downid }}">
										<input class="change-button" type="submit" name="submit" value="&#8673;" >
									</form>
								</div>
							@endif
						@endif
					</div>
					</div>
				</td>
				@if ($child->id == $man->id && count($man->children) > 0)
				<td>
					<svg height="20" width="40">
						<line x1="0" y1="10" x2="40" y2="10" style="stroke:rgb(0,0,0);stroke-width:2" />
						Балдары:
					</svg>
				</td>
				@else
				<td></td>
				@endif
			</tr>
			@php
				$i++;
			@endphp
		@endforeach
		</table>
		@if (count($man->children) > 0)
			<table class="tree">
			@for($p = 1; $p<$man->kanchanchy_bala; $p++)
			<tr>
				<td>
					<div class="btn text-nowrap font-weight-bold border border-dark rounded-pill bg-primary text-white w-100 h-100" style="color: #f8f9fa !important; background-color: #f8f9fa !important;border-color: #f8f9fa !important;">Table</div>
				</td>
			</tr>
			@endfor
			@php
				$i = 1;
				$children = $man->children;
			@endphp
			@foreach($children as $key => $child)
				<tr>
					<td>
						<div class="container">
						<div class="row flex-nowrap">
							<a class="btn text-nowrap font-weight-bold border border-dark rounded-pill bg-primary text-white w-100 h-100"
								href="{{ route('admin.man.edit', $child->id) }}">
								{{ $child->name }}
							</a>
							@if($man->bala_sany > 1)
								@if ($i != 1)
									@php
										$upid = $child->id;
										$downid = $children[$key - 1];
									@endphp
									<!-- Up Button nebere -->
									<div class="p-0 text-center">
									<form action="{{ route('admin.man.up') }}" method="post">
										@csrf
										<input type="hidden" name="upid" value="{{ $upid }}">
										<input type="hidden" name="downid" value="{{ $downid }}">
										<button type="submit" name="submit" class="change-button">&#8673;</button>
									</form>
									</div>
								@endif
							@endif
						</div>
						</div>
					</td>
				</tr>
			@endforeach
			</table>
		@endif
	</div>
</div>