@extends('admin.layouts.app_admin')

@section('content')
    
<div class="container">
    
    @component('admin.components.breadcrumb')
        @slot('title') Макалалар тизмеси @endslot
        @slot('parent') Башкы бет @endslot
        @slot('active') Макалалар @endslot
    @endcomponent

    <hr>

    <a href="{{route('admin.article.create')}}" class="btn btn-primary float-right"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Макала түзүү</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Аталышы</th>
                <th>Жарыялоо</th>
                <th class="text-right">Аракет</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td>{{$article->title}}</td>
                    <td>{{$article->published}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Өчүрүү керекпи?')){ return true }else{ return false }" action="{{route('admin.article.destroy', $article)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <a class="btn btn-default" href="{{ route('admin.article.edit', $article) }}"><i class="fas fa-edit"></i></a>
                            <button type="submit" class="btn"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Макалалар жок</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination float-right">
                        {{$articles->links()}}
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

@endsection