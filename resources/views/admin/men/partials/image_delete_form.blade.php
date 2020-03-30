@if ($active_man->image != null)
<form onsubmit="if(confirm('Уулдун сүрөтүн өчүрүү керекпи?')){ return true }else{ return false }" action="{{route('admin.man.image-delete', $active_man)}}" method="post">
	<input type="hidden" name="_method" value="DELETE">
	@csrf
	<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Уулдун сүрөтүн өчүрүү</button>
</form>
@endif
@if(isset($active_woman) && $active_woman->image != null)
<form onsubmit="if(confirm('Кыздын сүрөтүн өчүрүү керекпи?')){ return true }else{ return false }" action="{{route('admin.woman.image-delete', $active_woman)}}" method="post">
	<input type="hidden" name="_method" value="DELETE">
	@csrf
	<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Кыздын сүрөтүн өчүрүү</button>
</form>
@endif