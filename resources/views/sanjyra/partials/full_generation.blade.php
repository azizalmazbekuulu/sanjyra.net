@if (isset($person) && $person != null)
@if ($person->father != null)
@include('sanjyra.partials.full_generation', ['person' => $person->father])
@endif
<span class="inline-block">
 &rAarr; 
<a href="{{route('man', $person)}}" class="inline-block font-normal text-blue-700 hover:text-blue-500 hover:underline @if($person->id === $active_man_id) bg-red-200 underline hover:bg-blue-300 px-2 rounded-md @endif">
    {{$person->name}}
</a></span>
@endif