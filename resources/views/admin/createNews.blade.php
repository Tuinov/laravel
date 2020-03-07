@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавить новость</div>

                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST"
                          action="@if(isset($news->id)) {{ route('admin.news.update', $news) }}
                    @else {{ route('admin.news.store') }} @endif">
                        @if(isset($news->id)) @method('PATCH')@endif
                        @csrf

                        <div class="form-group row">

                            <label for="newsTitle" class="col-md-2 col-form-label text-md-right">Название</label>

                            <div class="col-md-8">
                                <input id="newsTitle" type="text" class="form-control" name="title"
                                       value="{{ $news->title ?? old('title') }}" autocomplete="title" autofocus>
                                @if($errors->has('title'))
                                    <div class="alert alert-danger" role="alert">

                                        @foreach($errors->get('title') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newsCategory" class="col-md-2 col-form-label text-md-right">Категория</label>

                            @if($errors->has('category_id'))
                                <div class="alert alert-danger" role="alert">

                                    @foreach($errors->get('category_id') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif

                            <select name="category_id" id="newsCategory" class="form-control col-md-8">
                                @forelse($categories as $item)
                                    <option
                                            @if($item['id'] == old('category_id')) selected @endif
                                            value="{{ $item['id'] }}">
                                            {{ $item['name'] }}
                                    </option>
                                    <option value="123">неправильная</option>
                                @empty
                                    <h2>нет категорий</h2>
                                @endforelse
                            </select>

                        </div>

                        <div class="form-group row">
                            <label for="newsText" class="col-md-2 col-form-label text-md-right">Текст</label>

                            @if($errors->has('text'))
                                <div class="alert alert-danger" role="alert">

                                    @foreach($errors->get('text') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif

                                <textarea id="newsText" type="text" class="col-md-8 form-control"
                                          name="text" autofocus>{{ $news->text ??old('text') }}
                                </textarea>
                        </div>

                        <div class="form-group row">

                                <input type="file" name="image">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @if(isset($news->id)) изменить @else Добавить новость @endif
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
