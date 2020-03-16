@extends('layouts.app')

@section('content')
    <div class="container">

        @if(\Auth::user()->is_admin)
            <nav class="navbar">
                <a class="btn btn-primary" href="{{ route('admin.user.create') }}">Создать пользователя</a>
            </nav>
        @endif
        <div class="row justify-content-center">


            @forelse($users as $item)
                <div class="col-md-12 card">
                    <div class="card-body col-md-6">
                        <a href="{{ route('admin.user.edit', $item) }}">
                            <h2>{{ $item->id }} . {{ $item->name }}</h2>
                        </a>
                        <a href="{{ route('admin.user.edit', $item) }}">редактировать</a>

                    </div>
                    <div class="col-md-4">
                        <form action="{{ route('admin.user.destroy', $item) }}" method="post">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Удалить пользователя</button>
                        </form>
                    </div>

                </div>


            @empty
                <p>нет новостей</p>
            @endforelse
            {{ $users->links() }}
        </div>
    </div>
@endsection