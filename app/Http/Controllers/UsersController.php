<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    //検索する
    public function search(Request $request){
        // 1つ目の処理
        $keyword = $request->input('keyword');
        // 2つ目の処理
        if(!empty($keyword)){
            $user = User::where('username','like', '%'.$keyword.'%')->get();
            //dd($user);
            }else{
             $user = User::all();
        }
        // 3つ目の処理
        return view('users.search',['users'=>$user,'keyword'=>$keyword]);
    }

    //フォローする
    public function follow(User $user){
        $follower = auth()->user();
        //フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    //フォロー解除
    public function unfollow(User $user){
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }



}
