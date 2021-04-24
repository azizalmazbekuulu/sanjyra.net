<div class="p-3 flex flex-nowrap text-center mx-auto w-max max-w-full overflow-x-auto">
	<table class="tree">
		<tr>
			<td>
				<x-person-link :href="route('man', $father->id)" :active="$father->id === $active_man_id">
					{{ $father->name }}
				</x-person-link>
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
		@foreach($father->children as $child)
		<tr>
			<td>
				<x-person-link :href="route('man', $child->id)" :active="$child->id === $active_man_id">
					{{ $child->name }}
				</x-person-link>
			</td>
			<td>
			@if($man->id === $child->id && $man->bala_sany>0)
				<svg height="20" width="40">
					<line x1="0" y1="10" x2="40" y2="10" style="stroke:rgb(0,0,0);stroke-width:2" />
					Балдары:
				</svg>
			@endif
			</td>
		</tr>
		@endforeach
	</table>
	<table class="tree">
		@for($p = 1; $p<$man->kanchanchy_bala; $p++)
		<tr>
			<td>
				<div class="inline-block py-1 px-3 w-full h-full border border-green-50 font-bold leading-6 text-green-50 text-center">Table</div>
			</td>
		</tr>
		@endfor
		@foreach($man->children as $child)
		<tr>
			<td>
				<x-person-link :href="route('man', $child->id)">
					{{ $child->name }}
				</x-person-link>
			</td>
		</tr>
		@endforeach
	</table>
</div>