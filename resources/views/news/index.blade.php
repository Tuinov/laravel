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
                    <div class="card-body ">
                        <h2>{{ $item->id }} . {{ $item->title }}</h2>
                        <a  class="btn btn-success" href="@if(! empty(Auth::user()->is_admin)){{ route('admin.news.show', $item) }}

                        @else {{ route('show', $item) }}@endif">Подробнее..</a>

                    </div>

                    @if(! empty(Auth::user()->is_admin))
                    <div class="col-md-4">
                        <form action="{{ route('admin.news.destroy', $item) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить новость</button>
                        </form>
                    </div>
                    @endif

                </div>


            @empty
                <p>нет новостей</p>
            @endforelse
            {{ $news->links() }}
        </div>
    </div>
@endsection