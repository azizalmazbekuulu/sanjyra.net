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
                    <span class="card-header">Макалалар: {{ $count_articles }}</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-secondary text-white">
                    <span class="card-header">Ысымдар: {{ $count_names }}</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card bg-secondary text-white">
                    <span class="card-header">Адамдардын саны: {{ $count_men }}</span>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-4">
                <a href="{{route('admin.name.create')}}" class="btn btn-block btn-primary">Ысым түзүү</a>
                Акыркы ысымдар:
                @foreach ($names as $name)
                    <a href="{{route('admin.name.edit', $name)}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$name->name}}</h4>
                    </a>
                @endforeach
            </div>
            <div class="col-sm-4">
                <a href="{{route('admin.man.create')}}" class="btn btn-block btn-primary">Aдам кошуу</a>
                Акыркы кошулгандар:
                @foreach ($men as $man)
                    <a href="{{route('admin.man.edit', $man)}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$man->name}}</h4>
                        @if ($man->categories()->first() != null)
                            <p class="list-group-item-text">
                                Категориялар: {{$man->categories()->pluck('title')->implode(', ')}}
                            </p>
                        @endif
                    </a>
                @endforeach
            </div>
            <div class="col-sm-4">
                <a href="{{route('admin.article.create')}}" class="btn btn-block btn-primary">Макала түзүү</a>
                Акыркы макалалар:
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
                <a href="{{route('admin.category.create')}}" class="btn btn-block btn-primary">Категория түзүү</a>
                Акыркы категориялар:
                @foreach ($categories as $category)
                    <a href="{{route('admin.category.edit', $category)}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$category->title}}</h4>
                        <p class="list-group-item-text">
                            Макалалардын саны: {{$category->articles()->count()}}<br>
                            Адамдардындын саны: {{$category->men()->count()}}
                        </p>
                    </a>
                @endforeach
            </div>
            <div class="col-sm-6">
                <!--<a href="{{route('admin.man.create')}}" class="btn btn-block btn-primary">Адам кошуу</a>-->
                Акыркы кошулгандар:
                @foreach ($women as $woman)
                    <a href="{{route('admin.woman.edit', $woman)}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$woman->name}}</h4>
                        @if ($woman->categories()->first() != null)
                            <p class="list-group-item-text">
                                Категориялар: {{$woman->categories()->pluck('title')->implode(', ')}}
                            </p>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
        <hr>
    </div>
@endsection