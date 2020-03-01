<form id="izde" action="{{route('person-search')}}" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Аты</label>
	<input type="text" id="name" pattern="[А-Яа-я]{1,}" title="Атын жазыңыз" placeholder="Атын жазыңыз" name="name" required="required">
    </div>
    <div class="form-group">
        <label for="father_name">Атасынын аты</label>
        <input type="text" id="father_name" pattern="[А-Яа-я]{1,}" title="Атасынын атын жазыңыз" placeholder="Атасынын атын жазыңыз" name="father_name" required="required">
    </div>
    <button type="submit" class="btn btn-primary">Издөө</button>
</form>