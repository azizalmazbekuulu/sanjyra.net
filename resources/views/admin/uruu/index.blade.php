@extends('admin.layouts.app_admin')

@section('content')
    
<div class="container">
    
    @component('admin.components.breadcrumb')
        @slot('title') Уруулар тизмеси @endslot
        @slot('parent') Башкы бет @endslot
        @slot('active') Уруулар @endslot
    @endcomponent

    <hr>

    <a href="{{route('admin.uruu.create')}}" class="btn btn-primary float-right"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Уруу түзүү</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Аталышы</th>
                <th>Кыскача аныктама</th>
                <th class="text-right">Аракет</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($uruular as $uruu)
                <tr>
                    <td>{{$uruu->name}}</td>
                    <td>{!! $uruu->description_short!!}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Өчүрүү керекпи?')){ return true }else{ return false }" action="{{route('admin.uruu.destroy', $uruu)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <a class="btn btn-default" href="{{ route('admin.uruu.edit', $uruu) }}"><i class="fas fa-edit"></i></a>
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
                    @php $paginator = $uruular; @endphp
                        @include('vendor.pagination.simple-bootstrap-4')
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

@endsection