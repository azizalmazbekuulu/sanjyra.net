<div class="col-sm-6">
    {{-- Акыркы ысымдар:
    <dl class="row">
    @foreach ($names as $name)
        <dt class="col-sm-4">
            <a href="{{route('name-show', $name->slug)}}">
                <h4>{{$name->name}}</h4>
            </a>
        </dt>
        <dd class="col-sm-8">
            <p>{!! $name->description !!}</p>
        </dd>
    @endforeach
        {{$names->links()}}
    </dl>
    <a href="{{route('name')}}">>>> Ысымдар</a> --}}
</div>
<div class="col-sm-6">
    <ul class="list-group w-100">
        <span class="list-group-item">Көп кездешкен ысымдар</span>
    @foreach ($common_names as $common_name)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{route('name', $common_name->slug)}}">
                <h4>{{$common_name->name}}</h4>
            </a>
            <span class="badge badge-primary badge-pill">{{$common_name->number_of_name}}</span>
        </li>
    @endforeach
    </ul>
</div>