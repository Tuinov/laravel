@extends('layouts.app')

@section('content')

    <div class="row row-cols-1 row-cols-md-3">
        @foreach($categories as $category)
        <div class="col mb-4">
            <div class="card">
                <img src="{{$category->image}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$category->name}}</h5>
                </div>
                <a href="#" class="btn btn-primary">Новости по категории</a>
            </div>
        </div>
        @endforeach

    </div>
@endsection