@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавить категорию</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.categories.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nameCategory" class="col-md-2 col-form-label text-md-right">Название</label>

                            <div class="col-md-8">
                                <input id="nameCategory" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="slug" class="col-md-2 col-form-label text-md-right">slug</label>

                            <div class="col-md-8">
                                <input id="slug" type="text" class="form-control" name="slug" value="{{ old('slug') }}" required autocomplete="slug" autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Добавить категорию
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
