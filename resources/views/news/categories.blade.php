@extends('layouts.app')

@section('title')
    @parent Categories
@endSection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @forelse($categories as $item)
                <div class="col-md-12 card">
                    <div class="card-body">
                    <h1>Категория:
                        <a href="{{ route('category.show', ['idCategory' => $item->id]) }}">{{ $item->name }}</a>
                    </h1>
                    @if($admin)
                        <p><a href="{{ route('category.show', ['idCategory' => $item->id]) }}">редактировать
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