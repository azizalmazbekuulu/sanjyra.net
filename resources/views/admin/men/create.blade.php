@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Эркек адамдарды кошуу @endslot
            @slot('parent') Башкы бет @endslot
            @slot('active') Эркек адамдар @endslot
        @endcomponent
        <hr>
        <form action="{{route('admin.man.store')}}" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.men.partials.form')

        </form>
    </div>
@endsection