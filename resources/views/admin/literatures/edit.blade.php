@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Колднулган адабияттарды оңдоо @endslot
            @slot('parent') Башкы бет @endslot
            @slot('active') Колднулган адабияттар @endslot
        @endcomponent
        <hr>
        <form action="{{route('admin.literature.update', $literature)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.literatures.partials.form')
            <input type="hidden" name="modified_by" value="{{Auth::id()}}">
        </form>
    </div>
@endsection