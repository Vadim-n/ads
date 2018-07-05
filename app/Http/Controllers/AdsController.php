<?php

namespace App\Http\Controllers;

use App\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    public function index(){
        $ads = DB::table('ads')
            ->join('users', 'users.id', '=', 'ads.user_id')
            ->select('ads.id', 'users.name', 'ads.user_id', 'ads.title', 'ads.text', 'ads.image', 'ads.updated_at')
            ->orderBy('ads.updated_at', 'desc')
            ->limit(20)->get();
        return view('ads.index', compact('ads'));
    }
    public function allAds(){
        $ads = DB::table('ads')
            ->join('users', 'users.id', '=', 'ads.user_id')
            ->select('ads.id', 'users.name', 'ads.user_id', 'ads.title', 'ads.text', 'ads.image', 'ads.updated_at')
            ->paginate(12);
        return view('ads.all', compact('ads'));
    }
    public function create(){
        if (!Auth::guest()) {
            return view('ads.create');
        }
        else {
            return redirect('/');
        }
    }
    public function show($id){
        $ads = DB::table('ads')
                ->join('users', 'users.id', '=', 'ads.user_id')
                ->select('ads.id', 'users.name', 'ads.title', 'ads.text', 'ads.image', 'ads.user_id')
                ->where('ads.id', $id)->get();
        $ad = $ads[0];
        return view('ads.show', compact('ad'));
        return redirect('/');
    }
    public function store(Request $request){
        if (!Auth::guest()) {
            $ad = new Ad();
            $this->saveAd($ad, $request);
            return redirect('/home');
        }
        else {
            return redirect('/');
        }
    }
    public function edit($id, Request $request){
        if (!Auth::guest()) {
            $ad = Ad::find($id);
            return view('ads.edit', compact('ad'));
        }
        else {
            return redirect('/');
        }
    }
    public function update($id, Request $request){
        if (!Auth::guest()) {
            $ad = Ad::find($id);
            $this->saveAd($ad, $request);
            return redirect('/home');
        }
        else {
            return redirect('/');
        }
    }
    public function delete($id){
        if (!Auth::guest()) {
            $ad = Ad::find($id);
            $ad->delete();
            return redirect('/home');
        }
        else {
            return redirect('/');
        }
    }
    private function saveAd(Ad $ad, Request $request){
        $this->validate($request, [
            'title' => 'required|max:255',
            'text' => 'required|max:1000',
        ]);

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $destinationPath = public_path() . '/images/uploads/';
            $filename = date('dmY') . $file->getClientOriginalName();
            $ad->image = '/images/uploads/' . $filename;
            $request->file('image')->move($destinationPath, $filename);
        }
        $ad->user_id = Auth::user()->id;
        $ad->title = $request->title;
        $ad->text = $request->text;
        $ad->save();
    }
}
