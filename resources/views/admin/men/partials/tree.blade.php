@php
    $man_child_count = count($man->children);
    $count = count($father->children) + $man_child_count;
    $sons = $father->children;
    $childs = $man->children;
    $is_father_id = false;
    $is_first_son = $man->id === $sons[0]->id;
    $man_index = 1;
    foreach ($sons as $key => $son) {
        if ($son->id === $man->id)
            $man_index = $key;
    }
@endphp
<div class="container py-3" style="overflow: auto;">
    <div class="row flex flex-nowrap">
        <table class="tree">
            @for($i = 0; $i <= $count; $i++)
                <tr>
                    <td>
                        @if($i === 0)
                            <a class="btn text-nowrap font-weight-bold border border-dark rounded-pill
                            @if ($father->id == $active_man_id)
                                bg-success text-danger
@else
                                bg-primary text-white
@endif
                                w-100 h-100" href="{{route('admin.man.edit', $father->id)}}">
                                {{ $father->name }}
                            </a>
                        @endif
                    </td>
                    <td>
                        @if($i === 0)
                            <svg height="20" width="40">
                                <line x1="0" y1="10" x2="40" y2="10" style="stroke:rgb(0,0,0);stroke-width:2"/>
                                Балдары:
                            </svg>
                        @endif
                    </td>
                    <td>
                        @if(isset($sons[$i]))
                            <div class="container">
                                <div class="row flex-nowrap">
                                    <a class="btn text-nowrap font-weight-bold border border-dark rounded-pill
							@if ($sons[$i]->id == $active_man_id)
                                        bg-success text-danger
@else
                                        bg-primary text-white
@endif
                                        w-100 h-100" href="{{route('admin.man.edit', $sons[$i]->id)}}">
                                        {{ $sons[$i]->name }}
                                    </a>
                                @if($father->bala_sany > 1)
                                    @if (isset($sons[$i - 1]))
                                        @php
                                            $upid = $sons[$i]->id;
                                            $downid = $sons[$i - 1]->id;
                                        @endphp
                                        <!-- Up Button -->
                                            <div class="p-0 text-center">
                                                <form action="{{route('admin.man.up')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="upid" value="{{ $upid }}">
                                                    <input type="hidden" name="downid" value="{{ $downid }}">
                                                    <input class="change-button" type="submit" name="submit"
                                                           value="&#8673;">
                                                </form>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @endif
                    </td>
                    <td>
                        @if(isset($sons[$i]) && $man->id === $sons[$i]->id && $man_child_count > 0)
                            <svg height="20" width="40">
                                <line x1="0" y1="10" x2="40" y2="10" style="stroke:rgb(0,0,0);stroke-width:2"/>
                                Балдары:
                            </svg>
                        @endif
                    </td>
                    <td>
                        @php
                            if (isset($sons[$i]) && $sons[$i]->id === $man->id)
                                $is_father_id = true;
                        @endphp
                        @if($man_child_count > 0 && $is_father_id)
                            @php
                                    $order = $i - $man_index;
                            @endphp
                            @if(isset($childs[$order]))
                                <div class="container">
                                    <div class="row flex-nowrap">
                                        <a class="btn text-nowrap font-weight-bold border border-dark rounded-pill bg-primary text-white w-100 h-100"
                                           href="{{ route('admin.man.edit', $childs[$order]->id) }}">
                                            {{ $childs[$order]->name }}
                                        </a>
                                    @if($man->bala_sany > 1)
                                        @if (isset($childs[$order - 1]))
                                            @php
                                                $upid = $childs[$order]->id;
                                                $downid = $childs[$order - 1]->id;
                                            @endphp
                                            <!-- Up Button nebere -->
                                                <div class="p-0 text-center">
                                                    <form action="{{ route('admin.man.up') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="upid" value="{{ $upid }}">
                                                        <input type="hidden" name="downid" value="{{ $downid }}">
                                                        <button type="submit" name="submit" class="change-button">
                                                            &#8673;
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endif
                    </td>
                </tr>
            @endfor
        </table>
    </div>
</div>
