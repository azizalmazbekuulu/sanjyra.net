<div class="row justify-content-center d-flex flex-nowrap pt-3" style="overflow: auto;">
    <table class="tree">
        <tbody>
            <tr>
                <td>
                    <a class="btn font-weight-bold border border-dark rounded-pill
                    @if ($father->id == $active_man_id)
                        bg-success text-danger
                    @else
                        bg-primary text-white
                    @endif
                     w-100 h-100"
                     href="{{route('admin.man.edit', $father)}}">
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
        </tbody>
    </table>
    <table class="tree">
        <tbody>
            @foreach ($father->children as $child)
            <tr>
                <td>
                    <a class="btn font-weight-bold border border-dark rounded-pill 
                    @if ($child->id == $active_man_id)
                        bg-success text-danger
                    @else
                        bg-primary text-white
                    @endif
                     w-100 h-100"
                     href="{{route('admin.man.edit', $child)}}">
                        {{$child->name}}
                    </a>
                </td>
                @if ($child->bala_sany > 0 && $child->id == $man->id)
                    <td>
                        <svg height="20" width="40">
                        <line x1="0" y1="10" x2="40" y2="10" style="stroke:rgb(0,0,0);stroke-width:2" />
                        Балдары:
                        </svg>
                    </td>
                    <?php $grandlining = $child->kanchanchy_bala - 1; ?>
                @else
                    <td></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    <table class="tree">
        <tbody>
            @isset($grandlining)
                @for ($i = 0; $i < $grandlining; $i++)
                    <tr>
                        <td><span class="btn">&nbsp;</span></td>
                    </tr>
                @endfor
            @endisset
            @if ($man->bala_sany > 0)
                @foreach ($man->children as $grandchild)
                <tr>
                    <td>
                        <a class="btn bg-primary font-weight-bold text-white border border-dark rounded-pill w-100 h-100" href="{{route('admin.man.edit', $grandchild)}}">
                            {{ $grandchild->name }}
                        </a>
                    </td>
                </tr>
                @endforeach
            @endif
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
                "
                href="{{route('admin.woman.edit', $kyzy)}}">
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
                            <dt class="col-sm-2">Балдары</dt>
                            <dd class="col-sm-10">
                                @foreach ($active_woman->uuldary as $uulu)
                                    <a class="btn font-weight-bold border border-dark bg-primary text-white"
                                    href="{{route('admin.man.edit', $uulu)}}">
                                        {{ $uulu->name }}
                                    </a>
                                @endforeach
                            </dd>
                        @endif
                        @if ($active_woman->categories()->first() != null)
                            <dt class="col-sm-3">Категориялар</dt>
                            <dd class="list-group-item-text col-sm-9">
                                {{$active_woman->categories()->pluck('title')->implode(', ')}}
                            </dd>
                        @endif
                        @if ($active_woman->info != '')
                            <dt class="col-sm-3">Маалымат</dt>
                            <dd class="col-sm-9">{!! $active_woman->info !!}</dd>
                        @endif
                        </dl>
                    </div>
                </div>
            @endisset
        </dd>
    @endif
    @if ($active_man->categories()->first() != null)
        <dt class="col-sm-3">Категориялар</dt>
        <dd class="list-group-item-text col-sm-9">
            {{$active_man->categories()->pluck('title')->implode(', ')}}
        </dd>
    @endif
    @if ($active_man->info != '' && !isset($active_woman))
        <dt class="col-sm-3">Маалымат</dt>
        <dd class="col-sm-9">{!! $active_man->info !!}</dd>
    @endif
</dl>
</div></div>