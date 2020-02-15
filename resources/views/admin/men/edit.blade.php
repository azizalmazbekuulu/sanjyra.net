@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Эркек адамдарды оңдоо @endslot
            @slot('parent') Башкы бет @endslot
            @slot('active') Эркек адамдар @endslot
        @endcomponent
        <hr>
        <form action="{{route('admin.man.update', $man)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.men.partials.form')

        </form>
    </div>
@endsection