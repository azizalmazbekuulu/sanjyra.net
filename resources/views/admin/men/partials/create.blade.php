<div class="container border pt-3 bg-secondary text-light">
@if ($active_man->bala_sany == 0 && $active_man->kyzdary->first() == null)
    <form onsubmit="if(confirm('Уулду өчүрүү керекпи?')){ return true }else{ return false }" action="{{route('admin.man.destroy', $active_man)}}" method="post">
        <input type="hidden" name="_method" value="DELETE">
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Уулду өчүрүү</button>
    </form>
@endif
@isset($active_woman_id)
    <form onsubmit="if(confirm('Кызды өчүрүү керекпи?')){ return true }else{ return false }" action="{{route('admin.woman.destroy', $active_woman)}}" method="post">
        <input type="hidden" name="_method" value="DELETE">
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Кызды өчүрүү</button>
    </form>
@endisset
<form action="{{route('admin.man.store')}}" method="post">
    @csrf
    <div class="form-group">
        <input class="btn btn-primary float-right ml-3 border border-success" type="submit" value="Уул кошуу">
        <input formaction="{{route('admin.woman.store')}}" class="btn btn-primary float-right ml-3 border border-success" type="submit" value="Кыз кошуу">
        <label for="name">Бала кошуу</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Баланын ысымы" required pattern="^[А-Яа-яӨөҢңҮү\s-]+$" title="Ысым жазыңыз">
    </div>
    <input type="hidden" name="father_id" value="{{$active_man->id}}">
    <input type="hidden" name="level" value="{{$active_man->level}}">
    <input type="hidden" name="uruusu" value="{{$active_man->uruusu}}">
    <input type="hidden" name="kanchanchy_bala" value="{{$active_man->bala_sany}}">
    <input type="hidden" name="created_by" value="{{Auth::id()}}">
</form>
</div>