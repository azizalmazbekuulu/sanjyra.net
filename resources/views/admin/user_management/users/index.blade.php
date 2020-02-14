@extends('admin.layouts.app_admin')

@section('content')
    
<div class="container">
    
    @component('admin.components.breadcrumb')
        @slot('title') Список пользователей @endslot
        @slot('parent') Главвная @endslot
        @slot('active') Ползователи @endslot
    @endcomponent

    <hr>

    <a href="{{route('admin.user_management.user.create')}}" class="btn btn-primary float-right"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Создать пользователья</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Email</th>
                <th class="text-right">Действие</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){ return true }else{ return false }" action="{{route('admin.user_management.user.destroy', $user)}}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <a class="btn btn-default" href="{{ route('admin.user_management.user.edit', $user) }}"><i class="fas fa-edit"></i></a>
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
                        {{$users->links()}}
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

@endsection