@extends('layout')

@section('content')
    <div class="container">
        <h1>{{$ad->title}}</h1>
        <p>Автор: <a href="/user/{{$ad->user_id}}">{{$ad->name}}</a></p>
        <img src="{{$ad->image}}" alt="" style="max-width: 600px; float: left; max-height: 400px; margin: 0 20px 0 0;">
        <p>{{$ad->text}}</p>
        <div class="clearfix"></div>
    </div>
@endsection