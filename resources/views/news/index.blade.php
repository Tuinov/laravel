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
                    <div class="card-body col-md-6">
                        <h2>{{ $item->id }} . {{ $item->title }}</h2>
                        <a href="@if(!empty($admin)){{ route('admin.news.show', $item) }}

                        @else {{ route('show', $item) }}@endif">подробнее...</a>

                    </div>
                    <div class="col-md-4">
                        <form action="{{ route('admin.news.destroy', $item) }}" method="post">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Удалить новость</button>
                        </form>
                    </div>

                </div>


            @empty
                <p>нет новостей</p>
            @endforelse
            {{ $news->links() }}
        </div>
    </div>
@endsection