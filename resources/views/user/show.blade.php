@extends('layout')

@section('content')
    <div class="container">
            <div class="panel panel-default">
                <h1 class="panel-heading">Профиль пользователя {{$user->name}}</h1>

                        <table class="table table-striped task-table">
                            <tbody>
                            <tr>
                                <td class="table-text">
                                    Имя
                                </td>
                                <td>
                                    {{$user->name}}
                                </td>
                            <tr>
                                <td class="table-text">
                                    E-mail
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                            </tr>
                            <tr>
                                <td class="table-text">
                                    ФИО
                                </td>
                                <td>
                                    {{$user->fio}}
                                </td>
                            </tr>
                            <tr>
                                <td class="table-text">
                                    Телефон
                                </td>
                                <td>
                                    {{$user->tel}}
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    <h2>Объявления пользователя {{$user->name}}</h2>
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
                                                <a href="/ad/{{$ad->id}}" class="btn btn-sm btn-outline-secondary">Смотреть</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <h2>Добавить отзыв</h2>
                    <form action="/user/{{$user->id}}/comment" enctype="multipart/form-data" method="post">

                        <div class="form-group">
                            {{csrf_field()}}
                            <input type="text" class="form-control" name="name" placeholder="Имя">
                        </div>
                        <div id="reviewStars-input">
                            <input id="star-4" type="radio" value="5" name="reviewStars"/>
                            <label title="gorgeous" for="star-4"></label>

                            <input id="star-3" type="radio" value="4" name="reviewStars"/>
                            <label title="good" for="star-3"></label>

                            <input id="star-2" type="radio" value="3" name="reviewStars"/>
                            <label title="regular" for="star-2"></label>

                            <input id="star-1" type="radio" value="2" name="reviewStars"/>
                            <label title="poor" for="star-1"></label>

                            <input id="star-0" type="radio" value="1" name="reviewStars"/>
                            <label title="bad" for="star-0"></label>
                        </div>
                        <div class="form-group">
                            {{csrf_field()}}
                            <textarea class="form-control" name="text" rows="3" placeholder="Текст отзыва"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>

                    </form>
                    <h2>Отзывы о пользователе {{$user->name}}</h2>
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
                    Средняя оценка: {{$averageMark != null ? round($averageMark, 2) : 'нет оценки'}}
                    <hr>
                    @foreach($comments as $comment)
                        <div class="comment">
                            <p><strong>{{$comment->name}}</strong></p>
                            <p><strong>Оценка:</strong> {{$comment->mark != null ? $comment->mark : 'нет оценки'}}</p>
                            <p><strong>Отзыв:</strong> {{$comment->text}}</p>
                        </div>
                        <hr>
                    @endforeach
            </div>
        </div>
@endsection
