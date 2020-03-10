@extends('layouts.app')
{{--@dd($user)--}}
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактировать профиль</div>

                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post"
                              action="{{ route('updateProfile') }}">

                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Имя</label>
                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ $user->name }}" autocomplete="name" autofocus>
                                    @if($errors->has('name'))
                                        <div class="alert alert-danger" role="alert">

                                            @foreach($errors->get('name') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">email</label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ $user->email }}" autocomplete="email" autofocus>
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger" role="alert">

                                            @foreach($errors->get('email') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                         изменить
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="card-header">Новости пользователя</div>
                    <div class="card-body">
                        <ul>
                            <li>Новость</li>
                            <li>Новость</li>
                            <li>Новость</li>
                            <li>Новость</li>
                        </ul>

                    </div>
            </div>
        </div>
    </div>
@endsection
