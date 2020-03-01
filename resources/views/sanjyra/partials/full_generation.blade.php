@if (isset($person) && $person != null)
    @if ($person->father != null)
        @include('sanjyra.partials.full_generation', [
            'person' => $person->father
        ])
    @endif
    &rAarr; <a class="font-weight-bold" href="{{route('man', $person)}}">{{$person->name}}</a>
@endif