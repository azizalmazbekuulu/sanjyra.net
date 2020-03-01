@if (isset($person) && $person != null)
    @if ($person->father != null)
        @include('admin.men.partials.full_generation', [
            'person' => $person->father
        ])
    @endif
    &rAarr; <a class="font-weight-bold" href="{{route('admin.man.edit', $person)}}">{{$person->name}}</a>
@endif