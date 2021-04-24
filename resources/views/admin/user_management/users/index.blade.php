@extends('admin.layouts.app_admin')

@section('content')
    
<div class="container">
    
    @component('admin.components.breadcrumb')
        @slot('title') Колдонуучулардын тизмеси @endslot
        @slot('parent') Башкы бет @endslot
        @slot('active') Колдонуучулар @endslot
    @endcomponent

    <hr>

    <a href="{{route('admin.user_management.user.create')}}" class="btn btn-primary float-right"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Колдонуучу түзүү</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Аты</th>
                <th>Email</th>
                <th class="text-right">Аракет</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Өчүрүү керекпи?')){ return true }else{ return false }" action="{{route('admin.user_management.user.destroy', $user)}}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <a class="btn btn-default" href="{{ route('admin.user_management.user.edit', $user) }}"><i class="fas fa-edit"></i></a>
                            <button type="submit" class="btn"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Маалыматтар жок</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination float-right">
                    @php $paginator = $users; @endphp
                        @include('vendor.pagination.simple-bootstrap-4')
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

@endsection