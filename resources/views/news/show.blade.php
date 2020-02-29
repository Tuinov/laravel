@extends('layouts.app')

@section('content')
    <div class="container">
        @if(empty($admin))
            <nav class="navbar">
                <a class="btn btn-primary" href="{{ route('admin.news.edit', $news) }}">Редактировать новость</a>
{{--                {{ method_field('PUT') }}--}}
                <form enctype="multipart/form-data" method="POST"
                      action="{{ route('admin.news.destroy', $news) }}">

                    @csrf
                    @method('DELETE')


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-danger">
                                удалить новость
                            </button>
                        </div>
                    </div>
                </form>
            </nav>
        @endif
        <div class="row justify-content-center">

            <div class="card">

                <div class="card-header">{{ $news->title }}
                </div>
                <div class="card-body col-md-8">

                    <img class="news-img" src="{{ $news->image ?: asset('img/image.jpg') }}" alt="картинка">
                    <h3>{{ $news->text }}</h3>
                    <a href="{{ route('home') }}">вернуться к новостям</a>

                </div>
            </div>
        </div>
    </div>
@endsection