@extends('admin.layouts.app_admin')

@section('content')
    
<div class="container">
    
    @component('admin.components.breadcrumb')
        @slot('title') Эркек адамдардын тизмеси @endslot
        @slot('parent') Башкы бет @endslot
        @slot('active') Эркек адамдар @endslot
    @endcomponent

    <hr>

    <a href="{{route('admin.man.create')}}" class="btn btn-primary float-right"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Эркек адам кошуу</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Адам</th>
                <th>Адам</th>
                <th class="text-right">Аракет</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($men as $man)
                <tr>
                    <td>{{$man->name}}</td>
                    <td>
                        {{$man->father_id}}
                    </td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Өчүрүү керекпи?')){ return true }else{ return false }" action="{{route('admin.man.destroy', $man)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <a class="btn btn-default" href="{{ route('admin.man.edit', $man) }}"><i class="fas fa-edit"></i></a>
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
                        {{$men->links()}}
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>
    <hr>
    @include('admin.men.partials.tree', $man)
</div>

@endsection