<div class="container border pt-3 bg-secondary text-light">
@if ($active_man->bala_sany == 0)
    <form onsubmit="if(confirm('Өчүрүү керекпи?')){ return true }else{ return false }" action="{{route('admin.man.destroy', $active_man)}}" method="post">
        <input type="hidden" name="_method" value="DELETE">
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Өчүрүү</button>
    </form>
@endif
<form action="{{route('admin.man.store')}}" method="post">
    @csrf
    <div class="form-group">
        <input class="btn btn-primary float-right" type="submit" value="Кошуу">
        <label for="">Уул кошуу</label>
        <input type="text" class="form-control" name="name" placeholder="Уулдун ысымы">
    </div>
    <input type="hidden" name="father_id" value="{{$active_man->id}}">
    <input type="hidden" name="level" value="{{$active_man->level}}">
    <input type="hidden" name="uruusu" value="{{$active_man->uruusu}}">
    <input type="hidden" name="kanchanchy_bala" value="{{$active_man->bala_sany}}">
    <input type="hidden" name="created_by" value="{{Auth::id()}}">
</form>
</div>