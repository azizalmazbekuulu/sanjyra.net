@extends('admin.layouts.app_admin')

@section('content')
    
<div class="container">
    
    @component('admin.components.breadcrumb')
        @slot('title') Список новостей @endslot
        @slot('parent') Главвная @endslot
        @slot('active') Новости @endslot
    @endcomponent

    <hr>

    <a href="{{route('admin.article.create')}}" class="btn btn-primary float-right"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Создать новость</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Наименование</th>
                <th>Публикация</th>
                <th class="text-right">Действие</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $article)
                <tr>
                    <td>{{$article->title}}</td>
                    <td>{{$article->published}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.article.destroy', $article)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <a class="btn btn-default" href="{{ route('admin.article.edit', $article) }}"><i class="fas fa-edit"></i></a>
                            <button type="submit" class="btn"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Данные отсутствуют</td>
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