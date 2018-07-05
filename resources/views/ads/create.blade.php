@extends('layout')

@section('content')
    <div class="container">
        <h1>Создание объявления</h1>

        <form action="/ad/store" enctype="multipart/form-data" method="post">

            <div class="form-group">
                {{csrf_field()}}
                <input type="text" class="form-control" name="title" placeholder="Заголовок">
            </div>
            <div class="form-group">
                {{csrf_field()}}
                <textarea class="form-control" name="text" rows="3" placeholder="Текст объявления"></textarea>
            </div>
            <div class="form-group">
                {{csrf_field()}}
                <input type="file" name="image" accept="image/*">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>

        </form>
    </div>
@endsection    