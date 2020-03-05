@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Урууларды түзүү @endslot
            @slot('parent') Башкы бет @endslot
            @slot('active') Уруулар @endslot
        @endcomponent
        <hr>
        <form action="{{route('admin.uruu.store')}}" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.uruu.partials.form')
            <input type="hidden" name="created_by" value="{{Auth::id()}}">
        </form>
    </div>
@endsection