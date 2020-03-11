@extends('layouts.app')

@section('content')
    <div class="container">

        @if(! empty(Auth::user()->is_admin))
            <nav class="navbar">
                <a class="btn btn-primary" href="{{ route('admin.news.create') }}">Добавить новость</a>
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
                        <a href="">подробнее...</a>

                    </div>
                    <div class="col-md-4">
                        <form action="" method="post">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Удалить новость</button>
                        </form>
                    </div>

                </div>


            @empty
                <p>нет новостей</p>
            @endforelse
{{--            {{ $news->links() }}--}}
        </div>
    </div>
@endsection