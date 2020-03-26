<form id="izde" action="{{route('person-search')}}" method="get" class="form-inline">
    <div class="form-group">
        <input class="form-control" type="text" id="name" title="Атын жазыңыз" placeholder="Атын жазыңыз" name="name" required="required" pattern="^[А-Яа-яЁёӨөҢңҮү\s-]+$">
    </div>
    <div class="form-group">
        <input class="form-control" type="text" id="father_name" title="Атасынын атын жазыңыз" placeholder="Атасынын атын жазыңыз" name="father_name" required="required" pattern="^[А-Яа-яЁёӨөҢңҮү\s-]+$">
    </div>
    <div class="form-group">
        <select class="form-control" name="uruusu" id="uruusu">
            <option value="all">Уруулар</option>
            @isset($uruular)
                @foreach ($uruular as $uruu)
                    <option value="{{ $uruu->name }}">{{$uruu->name}}</option>
                @endforeach
            @endisset
        </select>
    </div>
    <input type="hidden" name="admin" value="true">
    <button type="submit" class="btn btn-primary">Издөө</button>
</form>