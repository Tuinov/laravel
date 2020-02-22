@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавить новость</div>

                @if(session('success'))
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                {{ session()->get('success')  }}
                            </div>
                        </div>
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.news.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="newsTitle" class="col-md-2 col-form-label text-md-right">Название</label>

                            <div class="col-md-8">
                                <input id="newsTitle" type="text" class="form-control" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newsCategory" class="col-md-2 col-form-label text-md-right">Категория</label>
                            <select name="category" id="newsCategory" class="form-control col-md-8">
                                @forelse($categories as $item)
                                    <option
                                            @if($item['id'] == old('category')) selected @endif
                                            value="{{ $item['id'] }}">
                                            {{ $item['name'] }}
                                    </option>
                                @empty
                                    <h2>нет категорий</h2>
                                @endforelse
                            </select>

                        </div>

                        <div class="form-group row">
                            <label for="newsText" class="col-md-2 col-form-label text-md-right">Текст</label>

                                <textarea id="newsText" type="text" class="col-md-8 form-control" name="text" autofocus>{{ old('text') }}
                                </textarea>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Добавить новость
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
