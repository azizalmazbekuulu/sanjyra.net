@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="card bg-secondary text-white">
                    <span class="card-header">Категорий: {{ $count_categories }}</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-secondary text-white">
                    <span class="card-header">Материалов: {{ $count_articles }}</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-secondary text-white">
                    <span class="card-header">Посетителей: 0</span>
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
                <a href="{{route('admin.category.create')}}" class="btn btn-block btn-primary">Создать категорию</a>
                Последние категории:
                @foreach ($categories as $category)
                    <a href="{{route('admin.category.edit', $category)}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$category->title}}</h4>
                        <p class="list-group-item-text">
                            Количество маткериалов: {{$category->articles()->count()}}
                        </p>
                    </a>
                @endforeach
            </div>
            <div class="col-sm-6">
                <a href="{{route('admin.article.create')}}" class="btn btn-block btn-primary">Создать материал</a>
                Последние материалы:
                @foreach ($articles as $article)
                    <a href="{{route('admin.article.edit', $article)}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$article->title}}</h4>
                        <p class="list-group-item-text">
                            Категории: {{$article->categories()->pluck('title')->implode(', ')}}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection