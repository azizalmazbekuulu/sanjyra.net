@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Эркек адамдарды оңдоо @endslot
            @slot('parent') Башкы бет @endslot
            @slot('active') Эркек адамдар @endslot
        @endcomponent
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <form action="{{route('admin.man.update', $man)}}" method="post">
                    <input type="hidden" name="_method" value="put">
                    {{ csrf_field() }}

                    {{-- Form include --}}
                    @include('admin.men.partials.form')

                </form>
            </div>
            <div class="col-sm-8">
                @include('admin.men.partials.tree')
            </div>
        </div>
    </div>
@endsection