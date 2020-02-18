@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            @if(!empty($categoryName))
                <div>
                    <h1><b>Все новости по категории {{ $categoryName }}:</b></h1>
                </div>
            @endif

            @forelse($news as $item)
                <div>

                    <h2>{{ $item['title'] }}</h2>
                    <a href="{{ route('show', ['id' => $item['id']]) }}">подробнее...</a>
                </div>

            @empty
                <p>нет новостей</p>
            @endforelse
        </div>
    </div>
@endsection