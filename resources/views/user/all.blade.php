@extends('layout')

@section('content')

    <div class="album py-5 bg-light">
        <div class="container">
            <h1>Пользователи</h1>
                @foreach($users as $user)
                    <p><a href="/user/{{$user->id}}">{{$user->name}}</a></p>
                @endforeach
        </div>
    </div>

@endsection