@extends('layouts.app')
{{--@dd($user)--}}
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактировать профиль</div>

                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST"
                              action="{{ route('admin.news.update', $user) }}">

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

                            <div class="form-group row">
                                <label for="password" class="col-md-2 col-form-label text-md-right">Пароль</label>
                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control" name="password"
                                            autocomplete="password" autofocus>
                                    @if($errors->has('password'))
                                        <div class="alert alert-danger" role="alert">

                                            @foreach($errors->get('password') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="newPassword" class="col-md-2 col-form-label text-md-right">Новый пароль</label>
                                <div class="col-md-8">
                                    <input id="newPassword" type="text" class="form-control" name="newPassword"
                                            autofocus>
                                    @if($errors->has('newPassword'))
                                        <div class="alert alert-danger" role="alert">

                                            @foreach($errors->get('newPassword') as $error)
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
            </div>
        </div>
    </div>
@endsection
