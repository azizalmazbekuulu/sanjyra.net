@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Категориияны оңдоо @endslot
            @slot('parent') Башкы бет @endslot
            @slot('active') Категориялар @endslot
        @endcomponent
        <hr>
        <form action="{{route('admin.category.update', $category)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.categories.partials.form')

        </form>
    </div>
@endsection