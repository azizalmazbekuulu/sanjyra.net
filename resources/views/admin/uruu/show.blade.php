@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Урууларды оңдоо @endslot
            @slot('parent') Башкы бет @endslot
            @slot('active') Уруулар @endslot
        @endcomponent
        <hr>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$uruu->name}}</h5>
                <p class="card-text">
                    {!! $uruu->description !!}
                </p>
            </div>
        </div>
    </div>
@endsection