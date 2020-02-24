<div class="row">
    <span class="float-right">
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
    </span>
    <span class="float-right">
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
    </span>
    <span class="float-right">
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
    </span>
</div>
<hr>
<dl class="row">
    @if ($active_man->uruusu != '')
        <dt class="col-sm-2">Уруусу</dt>
        <dd class="col-sm-10">{{$active_man->uruusu}}</dd>
    @endif
    @if ($active_man->mother_name != '' || $active_man->mother_id != 0)
        <dt class="col-sm-2">Энеси</dt>
        <dd class="col-sm-10">
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
        <dt class="col-sm-2">Кыздары</dt>
        <dd class="col-sm-10">
            <table class="tree">
                @foreach ($active_man->kyzdary as $kyzy)
                    <tr>
                        <td>
                            <a class="btn font-weight-bold border border-dark 
                            @if (isset($active_woman_id) && $kyzy->id == $active_woman_id)
                                bg-success text-danger
                            @else
                                bg-primary text-white
                            @endif
                            w-100 h-100"
                            href="{{route('admin.woman.edit', $kyzy)}}">
                                {{ $kyzy->name }}
                            </a>
                        </td>
                        <td>
                            <a class="btn bg-primary border border-dark text-white" href="#"><i class="fas fa-info fa-sm" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </dd>
    @endif
    @if ($active_man->categories()->first() != null)
        <dt>Категориялар</dt>
        <dd class="list-group-item-text">
            {{$active_man->categories()->pluck('title')->implode(', ')}}
        </dd>
    @endif
    @if ($active_man->info != '')
        <dt class="col-sm-2">Маалымат</dt>
        <dd class="col-sm-10">{!! $active_man->info !!}</dd>
    @endif
</dl>