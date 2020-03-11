@extends('layouts.app')

@section('title')
    @parent Categories
@endSection

@section('content')
    <div class="container">

        @if(\Auth::user()->is_admin)
            <nav class="navbar">
                <a class="btn btn-primary" href="{{ route('admin.categories.create') }}">Добавить категорию</a>
            </nav>
        @endif

        <div class="row justify-content-center">
            @forelse($categories as $item)
                <div class="col-md-12 card">
                    <div class="card-body">
                    <h1>Категория:
                        <a href="{{ route('category.show', ['idCategory' => $item->id]) }}">{{ $item->name }}</a>
                    </h1>
                    @if(Auth::user()->is_admin)
                        <p><a href="{{ route('admin.categories.edit',  $item) }}">редактировать
                                категорию</a>
                        </p>

                    @endif
                    {{--   @dump($loop)--}}
                    </div>
                </div>

            @empty
                <p>нет категорий</p>
            @endforelse
        </div>
    </div>
@endsection