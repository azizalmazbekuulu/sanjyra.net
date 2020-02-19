<div class="row">
    <span class="float-right">
        <table class="tree">
            <tbody>
                <tr>
                    <td>
                        <a class="btn btn-primary" href="{{route('man.man', $man->id)}}">
                            {{ $man->name }}
                        </a>
                    </td>
                    <td>
                        example
                    </td>
                </tr>
            </tbody>
        </table>
    </span>
    <span class="float-right">
        <table class="tree">
            <tbody>
                @foreach ($children as $child)
                <tr>
                    <td>
                        <a class="btn btn-primary w-100" href="{{route('man.man', $child->id)}}">
                            {{ $child->name }}
                        </a>
                    </td>
                    @if ($child->id == $grandchildren->first()->father_id)
                        <td>
                            example
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
                @if (isset($grandlining))
                    @for ($i = 0; $i < $grandlining; $i++)
                        <tr>
                            <td><span class="btn">&nbsp;</span></td>
                        </tr>
                    @endfor
                @endif
                @foreach ($grandchildren as $grandchild)
                <tr>
                    <td>
                        <a class="btn btn-primary w-100" href="{{route('man.man', $grandchild->id)}}">
                            {{ $grandchild->name }}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </span>
</div>