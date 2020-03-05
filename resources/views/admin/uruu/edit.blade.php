@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Урууларды оңдоо @endslot
            @slot('parent') Башкы бет @endslot
            @slot('active') Уруулар @endslot
        @endcomponent
        <hr>
        <form action="{{route('admin.uruu.update', $uruu)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.uruu.partials.form')
            <input type="hidden" name="modified_by" value="{{Auth::id()}}">
        </form>
    </div>
@endsection