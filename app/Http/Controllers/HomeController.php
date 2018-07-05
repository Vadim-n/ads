<?php

namespace App\Http\Controllers;

use App\Ad;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $ads = User::find($userId)->ads()->get();
        return view('user.home', compact('ads'));
    }
    public function update(Request $request, $id){
        $user = User::find($id);
        $user->fio = $request->fio;
        $user->tel = $request->tel;
        if($user->save()){
            Session::flash('success', 'Профиль обновлен!');
        }
        else {
            Session::flash('error', 'Что-то пошло не так...');
        }
        return redirect('/home');
    }
}
