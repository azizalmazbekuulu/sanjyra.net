@if($literature->image != null)
    <form onsubmit="if(confirm('Колдонулган адабияттын сүрөтүн өчүрүү керекпи?')){ return true }else{ return false }" action="{{route('admin.literature.image-delete', $literature)}}" method="post">
        <input type="hidden" name="_method" value="DELETE">
        @csrf
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Колдонулган адабияттын сүрөтүн өчүрүү</button>
    </form>
@endif