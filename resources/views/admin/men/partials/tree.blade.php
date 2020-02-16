<div class="row">
    <div class="col-sm-4">
        <table>
            <tbody>
                <tr>
                    <td>
                        <a class="btn btn-primary" href="#">
                            {{ $man->father_name }}
                        </a>
                    </td>
            </tbody>
        </table>
    </div>
    <div class="col-sm-4">
        <table>
            <tbody>
                <tr>
                    @foreach ($self_with_brothers as $brother)
                        <td>
                            <a class="btn btn-primary" href="#">
                                {{ $brother->name }}
                            </a>
                        </td>
                    @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-4">
        <table>
            <tbody>
                <tr>
                    @foreach ($children as $child)
                        <td>
                            <a class="btn btn-primary" href="#">
                                {{ $child->name }}
                            </a>
                        </td>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>