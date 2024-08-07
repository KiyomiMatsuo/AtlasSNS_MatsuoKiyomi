<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class FollowsController extends Controller
{
    //
    public function followList(){
        // フォローしているユーザーのIDを取得
        $following_id = Auth::user()->following()->pluck('followed_id');
        // Usersテーブルからフォローしている人の情報をとる
        $follows = Auth::user()->following()->get();
        // フォローしているユーザーのIDを元に投稿内容を取得
        $posts = Post::with('user')->whereIn('user_id', $following_id)->get();
        // dd($posts,$following_id);
        return view('follows.followList',compact('follows','posts'));
    }
    public function followerList(){
        //フォローされているユーザーのIDを取得
        $followed_id = Auth::user()->followed()->pluck('following_id');
        //Userテーブルからフォローされている人の情報をとる
        $followed = Auth::user()->followed()->get();
        //フォローされているユーザーのIDを元に投稿内容を取得
        $posted = Post::with('user')->whereIn('user_id', $followed_id)->get();
        //dd($posted,$followed_id);
        return view('follows.followerList', compact('followed','posted'));
    }



}
