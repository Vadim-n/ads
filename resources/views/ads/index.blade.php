@extends('layout')
@section('content')
    <div class="album py-5 bg-light">
        <div class="container">
            @if(!Auth::guest())
                <a href="/ad/create" class="btn btn-success">Создать объявление</a>
            @endif
            <h1>Последние объявления</h1>
            <div class="row">
                @foreach($ads as $ad)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <a href="/ad/{{$ad->id}}"><img class="card-img-top" src="{{$ad->image}}" alt="Card image cap"></a>
                        <div class="card-body">
                            <a href="/ad/{{$ad->id}}"><h3>{{$ad->title}}</h3></a>
                            <small class="text-muted">Опубликовано: {{$ad->updated_at}}</small>
                            <p class="card-text">{{substr($ad->text, 0, 50)}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/ad/{{$ad->id}}" class="btn btn-sm btn-outline-secondary">Смотреть</a>
                                    @if(!Auth::guest())
                                        @if($ad->user_id === Auth::user()->id)
                                            <a href="/ad/{{$ad->id}}/edit" class="btn btn-sm btn-outline-secondary">Изменить</a>
                                        @endif
                                    @endif
                                </div>
                                <small class="text-muted">Автор: <a href="/user/{{$ad->user_id}}">{{$ad->name}}</a></small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection