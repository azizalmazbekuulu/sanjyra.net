@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Колднулган адабияттарды түзүү @endslot
            @slot('parent') Башкы бет @endslot
            @slot('active') Колднулган адабияттар @endslot
        @endcomponent
        <hr>
        <form action="{{route('admin.literature.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.literatures.partials.form')
            <input type="hidden" name="created_by" value="{{Auth::id()}}">
        </form>
    </div>
@endsection