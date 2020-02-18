@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar">
                    <a class="btn btn-primary" href="">Добавить</a>
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
                                    <td><a href="">{{ $item['name'] }}</a></td>
                                    <td>{{ $item['id'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
