@extends('layouts.app')

@section('content')
    <div class="container">
        <div>

                <div>
                    <h1>{{ $news['title'] }}</h1>
                    <h3>{{ $news['text'] }}</h3>
                    <a href="{{ route('home') }}">вернуться к новостям</a>

                </div>

        </div>
    </div>
@endsection