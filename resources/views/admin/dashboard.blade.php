@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="card bg-secondary text-white">
                    <span class="card-header">Категорялар: {{ $count_categories }}</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-secondary text-white">
                    <span class="card-header">Материалдар: {{ $count_articles }}</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-secondary text-white">
                    <span class="card-header">Ысымдар: {{ $count_names }}</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-secondary text-white">
                    <span class="card-header">Сегодня: 0</span>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <a href="{{route('admin.category.create')}}" class="btn btn-block btn-primary">Категория түзүү</a>
                Акыркы категориялар:
                @foreach ($categories as $category)
                    <a href="{{route('admin.category.edit', $category)}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$category->title}}</h4>
                        <p class="list-group-item-text">
                            Материалдардын саны: {{$category->articles()->count()}}
                        </p>
                    </a>
                @endforeach
            </div>
            <div class="col-sm-6">
                <a href="{{route('admin.article.create')}}" class="btn btn-block btn-primary">Материал түзүү</a>
                Акыркы материалдар:
                @foreach ($articles as $article)
                    <a href="{{route('admin.article.edit', $article)}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$article->title}}</h4>
                        <p class="list-group-item-text">
                            Категориялар: {{$article->categories()->pluck('title')->implode(', ')}}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <a href="{{route('admin.name.create')}}" class="btn btn-block btn-primary">Ысым түзүү</a>
                Акыркы ысымдар:
                @foreach ($names as $name)
                    <a href="{{route('admin.name.edit', $name)}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$name->name}}</h4>
                    </a>
                @endforeach
            </div>
            <div class="col-sm-6">
                <a href="{{route('admin.man.create')}}" class="btn btn-block btn-primary">Эркек адам кошуу</a>
                Акыркы кошулгандар:
                @foreach ($men as $man)
                    <a href="{{route('admin.man.edit', $man)}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$man->name}}</h4>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection