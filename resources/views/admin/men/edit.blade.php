@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Эркек адамдарды оңдоо @endslot
            @slot('parent') Башкы бет @endslot
            @slot('active') Эркек адамдар @endslot
        @endcomponent
        <hr>
        @php
            $active_man = $man;
            if ($father->id == $active)
                $active_man = $father;
        @endphp
        <div class="row">
            <div class="col-sm-6">
                @include('admin.men.partials.create')
                <hr>
                <p class="text-primary">Маалыматтарды өзгөртүү:</p>
                <form 
                @if ($father->id == $active)
                    action="{{route('admin.man.update', $father)}}"
                @else
                    action="{{route('admin.man.update', $man)}}"
                @endif
                 method="post">
                    <input type="hidden" name="_method" value="put">
                    {{ csrf_field() }}

                    {{-- Form include --}}
                    @include('admin.men.partials.form')

                    <input type="hidden" name="modified_by" value="{{Auth::id()}}">
                </form>
            </div>
            <div class="col-sm-6" style="padding: 30px;">
                @include('admin.men.partials.tree')
            </div>
        </div>
    </div>
@endsection