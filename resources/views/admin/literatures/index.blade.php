@extends('admin.layouts.app_admin')

@section('content')
    
<div class="container">
    
    @component('admin.components.breadcrumb')
        @slot('title') Колднулган адабияттардын тизмеси @endslot
        @slot('parent') Башкы бет @endslot
        @slot('active') Колднулган адабияттар @endslot
    @endcomponent

    <hr>

    <a href="{{route('admin.literature.create')}}" class="btn btn-primary float-right"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Колднулган адабият түзүү</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Аталышы</th>
                <th>Аныктама</th>
                <th class="text-right">Аракет</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($literatures as $literature)
                <tr>
                    <td><a href="{{ route('admin.literature.show', $literature) }}">{{$literature->title}}</a></td>
                    <td>{!! $literature->description !!}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Өчүрүү керекпи?')){ return true }else{ return false }" action="{{route('admin.literature.destroy', $literature)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <a class="btn btn-default" href="{{ route('admin.literature.edit', $literature) }}"><i class="fas fa-edit"></i></a>
                            <button type="submit" class="btn"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Колднулган адабияттар жок</td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination float-right">
                        {{$literatures->links()}}
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

@endsection