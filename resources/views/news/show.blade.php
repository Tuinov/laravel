@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">{{ $news->title }}</div>
                <div class="card-body col-md-8">

                    <img class="news-img" src="{{ $news->image ?: asset('img/image.jpg') }}" alt="картинка">
                    <h3>{{ $news->text }}</h3>
                    <a href="{{ route('home') }}">вернуться к новостям</a>

                </div>
            </div>
        </div>
    </div>
@endsection