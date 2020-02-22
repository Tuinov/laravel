@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar">
                    <a class="btn btn-primary" href="{{ route('admin.categories.create') }}">Добавить категорию</a>
                    <a class="btn btn-primary" href="{{ route('admin.news.create') }}">Добавить новость</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-dark">
                            <thead>
                            <tr>

                                <th scope="col">#</th>
                                <th scope="col">Категория</th>
                                <th scope="col">Количество новостей</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $item)

                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td><a href="{{ route('category.show', ['idCategory' => $item['id']]) }}">{{ $item['name'] }}</a></td>
                                    <td>{{ $item['id'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <nav class="navbar">
                    <a class="btn btn-primary" href="{{ route('admin.categories.json') }}">json</a>
                    <a class="btn btn-primary" href="{{ route('admin.categories.file') }}">Выгрузить категории</a>
                </nav>
            </div>
        </div>
    </div>

@endsection
