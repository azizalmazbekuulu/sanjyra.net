@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Колдонуучуну өзгөртүү @endslot
            @slot('parent') Башкы бет @endslot
            @slot('active') Колдонуучулар @endslot
        @endcomponent
        <hr>
        <form action="{{route('admin.user_management.user.update', $user)}}" method="post">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.user_management.users.partials.form')
        </form>
    </div>
@endsection