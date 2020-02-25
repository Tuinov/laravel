@extends('layouts.app')

@section('content')
    <div class="container">
        @if(!empty($admin))
            <nav class="navbar">
                <a class="btn btn-primary" href="{{ route('admin.news.create') }}">Добавить новость</a>
                <a class="btn btn-primary" href="{{ route('admin.categories.create') }}">Добавить категорию</a>
            </nav>
        @endif
        <div class="row justify-content-center">

            @if(!empty($categoryName))
                <div class="card-header">
                    <h1><b>Все новости по категории {{ $categoryName }}:</b></h1>
                </div>
            @endif

            @forelse($news as $item)
                <div class="col-md-12 card">
                    <div class="card-body col-md-8">
                        <h2>{{ $item->id }} . {{ $item->title }}</h2>
                        <a href="{{ route('show', ['id' => $item->id]) }}">подробнее...</a>
                    </div>
{{--                    <div class="col-md-4 card ml-auto">--}}
{{--                        <a class="btn btn-primary" href="">редактировать новость</a>--}}
{{--                    </div>--}}

                </div>


            @empty
                <p>нет новостей</p>
            @endforelse
        </div>
    </div>
@endsection