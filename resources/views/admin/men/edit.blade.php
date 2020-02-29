@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Адамдарды оңдоо @endslot
            @slot('parent') Башкы бет @endslot
            @slot('active') Адамдар @endslot
        @endcomponent
        <hr>
        @php
            $active_man = $man;
            if ($father->id == $active_man_id)
                $active_man = $father;
        @endphp
        <div class="row">
            <div class="col-sm-6">
                @include('admin.men.partials.create')
                <hr>
                <p class="text-primary">Маалыматтарды өзгөртүү:</p>
                <form 
                @if (isset($active_woman))
                    action="{{route('admin.woman.update', $active_woman)}}"
                @else
                    @if ($father->id == $active_man_id)
                        action="{{route('admin.man.update', $father)}}"
                    @else
                        action="{{route('admin.man.update', $man)}}"
                    @endif
                @endif
                 method="post">
                    <input type="hidden" name="_method" value="put">
                    {{ csrf_field() }}

                    {{-- Form include --}}
                    @include('admin.men.partials.form')

                    <input type="hidden" name="modified_by" value="{{Auth::id()}}">
                </form>
            </div>
            <div class="col-sm-6 justify-content-center" style="padding: 30px;">
                @include('admin.men.partials.tree')
            </div>
        </div>
        <hr>
    </div>
@endsection