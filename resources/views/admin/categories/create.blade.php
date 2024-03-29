@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Категория түзүү @endslot
            @slot('parent') Башкы бет @endslot
            @slot('active') Категориялар @endslot
        @endcomponent
        <hr>
        <form action="{{route('admin.category.store')}}" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.categories.partials.form')

        </form>
    </div>
@endsection