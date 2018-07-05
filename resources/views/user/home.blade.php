@extends('layout')

@section('content')
<div class="container">
            <div class="panel panel-default">
                <h1 class="panel-heading">Профиль</h1>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Привет, {{Auth::user()->name}}!</h2>
                        <form action="/update/{{Auth::user()->id}}" method="post">

                        <table class="table table-striped task-table">
                            <tbody>
                                <tr>
                                    <td class="table-text">
                                        Имя
                                    </td>
                                    <td>
                                        {{Auth::user()->name}}
                                    </td>
                                <tr>
                                    <td class="table-text">
                                        E-mail
                                    </td>
                                    <td>
                                        {{Auth::user()->email}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-text">
                                        ФИО
                                    </td>
                                    <td>
                                        {{csrf_field()}}
                                        <input type="text" class="form-control" value="{{Auth::user()->fio}}" name="fio">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-text">
                                        Телефон
                                    </td>
                                    <td>
                                        {{csrf_field()}}
                                        <input type="text" class="form-control" id="tel" value="{{Auth::user()->tel}}" name="tel">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                            <button type="submit" class="btn btn-primary">
                                Сохранить
                            </button>
                        </form>
                        <br>
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{Session::get('error')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <a href="/ad/create" class="btn btn-success">Создать объявление</a>

                    <h2>Мои объявления</h2>
                        <div class="row">
                            @foreach($ads as $ad)
                                <div class="col-md-4">
                                    <div class="card mb-4 box-shadow">
                                        <a href="/ad/{{$ad->id}}"><img class="card-img-top" src="{{$ad->image}}" alt="Card image cap"></a>
                                        <div class="card-body">
                                            <a href="/ad/{{$ad->id}}"><h3>{{$ad->title}}</h3></a>
                                            <p class="card-text">{{substr($ad->text, 0, 50)}}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="/ad/{{$ad->id}}" class="btn btn-sm btn-outline-secondary">Смотреть</a>
                                                    <a href="/ad/{{$ad->id}}/edit" class="btn btn-sm btn-outline-secondary">Изменить</a>
                                                    <a href="/ad/{{$ad->id}}/delete" class="btn btn-sm btn-outline-secondary" onclick="return confirm('Удалить?');">Удалить</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                </div>
            </div>
</div>
@endsection
