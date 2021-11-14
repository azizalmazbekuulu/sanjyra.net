<div class="p-3 flex flex-nowrap items-start text-center mx-auto w-max max-w-full overflow-x-auto">
    @php
        $man_child_count = count($man->children);
        $count = count($father->children) + $man_child_count;
        $sons = $father->children;
        $childs = $man->children;
    @endphp
    <table style="border-spacing: 0px">
        @for($i = 0; $i <= $count; $i++)
            <tr>
                <td>
                    @if($i === 0)
                        <x-person-link :href="route('man', $father->id)" :active="$father->id === $active_man_id">
                            {{ $father->name }}
                        </x-person-link>
                    @endif
                </td>
                <td>
                    @if($i === 0)
                        <svg height="20" width="40">
                            <line x1="0" y1="10" x2="40" y2="10" style="stroke:rgb(0,0,0);stroke-width:2"/>
                            -----
                        </svg>
                    @endif
                </td>
                <td>
                    @if(isset($sons[$i]))
                    <x-person-link :href="route('man', $sons[$i]->id)"
                                   :active="$sons[$i]->id === $active_man_id">
                        {{ $sons[$i]->name }}
                    </x-person-link>
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
                    $order = $i - $man->kanchanchy_bala + 1;
                    @endphp
                    @if(isset($childs[$order]) && $man_child_count > 0 && $man->kanchanchy_bala >= $i + 1)
                        <x-person-link :href="route('man', $childs[$order]->id)">
                            {{ $childs[$order]->name }}
                        </x-person-link>
                    @endif
                </td>
            </tr>
        @endfor
    </table>
</div>
