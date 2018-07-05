<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Comment;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    public function show($id) {
        $user = User::find($id);
        $ads = $user->ads()->get();
        $comments = $user->comments()->orderBy('created_at', 'desc')->get();
        $averageMark = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.user_id', '=', $id)
            ->avg('comments.mark');
        return view('user.show', compact('user', 'ads', 'comments', 'averageMark'));
    }
    public function create($id, Request $request){
        $comment = new Comment();
        $this->validate($request, [
            'mark' => 'integer|between:1,5',
            'name' => 'required|max:255',
            'text' => 'required|max:1000',
        ]);
        $comment->user_id = $id;
        $comment->name = $request->name;
        $comment->text = $request->text;
        $comment->mark = $request->reviewStars;
        if($comment->save()){
            Session::flash('success', 'Профиль обновлен!');
        }
        else {
            Session::flash('error', 'Что-то пошло не так...');
        }
        return redirect('/user/'.$id);
    }
    public function allUsers(){
        $users = User::get();
        return view('user.all', compact('users'));
    }
}
