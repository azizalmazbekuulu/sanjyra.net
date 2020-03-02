<form id="izde" action="{{route('person-search')}}" method="post" class="form-inline">
    @csrf
    <div class="form-group">
        {{-- <label for="name">Аты</label> --}}
	<input class="form-control" type="text" id="name" pattern="[А-Яа-я]{1,}" title="Атын жазыңыз" placeholder="Атын жазыңыз" name="name" required="required">
    </div>
    <div class="form-group">
        {{-- <label for="father_name">Атасынын аты</label> --}}
        <input class="form-control" type="text" id="father_name" pattern="[А-Яа-я]{1,}" title="Атасынын атын жазыңыз" placeholder="Атасынын атын жазыңыз" name="father_name" required="required">
    </div>
    <div class="form-group">
        <select name="uruusu" id="uruusu">
            <option value="monoldor"></option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Издөө</button>
</form>