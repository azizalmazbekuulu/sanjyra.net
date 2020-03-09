<form action="{{route('main-search')}}" method="post" class="form-inline">
    @csrf
    <div class="form-group">
        <input type="text" name="query" class="form-control" placeholder="Издөө" pattern=".{3,}" title="Үчтөн ашык символ жазыңыз">
        <button type="submit" class="btn"><i class="fas fa-search"></i></button>
    </div>
</form>