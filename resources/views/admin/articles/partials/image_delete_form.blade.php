@if($article->image != null)
    <form onsubmit="if(confirm('Макаланын сүрөтүн өчүрүү керекпи?')){ return true }else{ return false }" action="{{route('admin.article.image-delete', $article)}}" method="post">
        <input type="hidden" name="_method" value="DELETE">
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Макаланын сүрөтүн өчүрүү</button>
    </form>
@endif