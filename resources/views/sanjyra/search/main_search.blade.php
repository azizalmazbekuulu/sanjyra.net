<form action="{{route('main-search')}}" method="get">
    <div class="form-row align-items-center">
        <div class="col-auto">
            <input type="text" name="q" class="form-control" placeholder="Издөө" required>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn float-right"><i class="fas fa-search"></i></button>
        </div>
    </div>
</form>