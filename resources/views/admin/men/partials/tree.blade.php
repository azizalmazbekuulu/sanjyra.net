<div class="row">
    <span class="float-right">
        <table class="tree">
            <tbody>
                <tr>
                    <td>
                        <a class="btn font-weight-bold btn-outline-danger text-white 
                        @if ($father->id == $active)
                            btn-success
                        @else
                            btn-primary
                        @endif
                         w-100 h-100"
                         href="{{route('admin.man.edit', $father)}}">
                            {{ $father->name }}
                        </a>
                    </td>
                    <td>
                        <svg height="20" width="40">
                            <line x1="0" y1="10" x2="40" y2="10" style="stroke:rgb(255,0,0);stroke-width:2" />
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
                        <a class="btn font-weight-bold btn-outline-danger text-white 
                        @if ($child->id == $active)
                            btn-success
                        @else
                            btn-primary
                        @endif
                         w-100 h-100"
                         href="{{route('admin.man.edit', $child)}}">
                            {{$child->name}}
                        </a>
                    </td>
                    @if ($child->children->first() !== null)
                        @if ($child->id == $man->id)
                            <td>
                                <svg height="20" width="40">
                                <line x1="0" y1="10" x2="40" y2="10" style="stroke:rgb(255,0,0);stroke-width:2" />
                                Балдары:
                                </svg>
                            </td>
                            <?php $grandlining = $child->kanchanchy_bala - 1; ?>
                        @else
                            <td></td>
                        @endif
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </span>
    <span class="float-right">
        <table class="tree">
            <tbody>
                @if (isset($grandlining))
                    @for ($i = 0; $i < $grandlining; $i++)
                        <tr>
                            <td><span class="btn">&nbsp;</span></td>
                        </tr>
                    @endfor
                @endif
                @if ($man->bala_sany > 0)
                    @foreach ($man->children as $grandchild)
                    <tr>
                        <td>
                            <a class="btn btn-primary font-weight-bold btn-outline-danger text-white w-100 h-100" href="{{route('admin.man.edit', $grandchild)}}">
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
            {{-- @if ($active_man->mother_id != 0)
                <a href="{{route('admin.woman.')}}"></a>
            @endif --}}
            {{$active_man->mother_name}}
        </dd>
    @endif
    @if ($active_man->info != '')
        <dt class="col-sm-2">Маалымат</dt>
        <dd class="col-sm-10">{!! $active_man->info !!}</dd>
    @endif
</dl>