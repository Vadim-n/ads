@extends('layout')

@section('content')
    <div class="container">
        <h1>Редактирование объявления №{{$ad->id}}: <strong>{{$ad->title}}</strong></h1>

        <form action="/ad/{{$ad->id}}/update" enctype="multipart/form-data" method="post">

            <div class="form-group">
                {{csrf_field()}}
                <input type="text" class="form-control" name="title" placeholder="Заголовок" value="{{$ad->title}}">
            </div>
            <div class="form-group">
                {{csrf_field()}}
                <textarea class="form-control" name="text" rows="3" placeholder="Текст объявления">{{$ad->text}}</textarea>
            </div>
            <div class="form-group">
                {{csrf_field()}}
                <input type="file" name="image" accept="image/*">
            </div>
            <img src="{{$ad->image}}" alt="">
            <div class="form-group">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>

        </form>
    </div>
@endsection    