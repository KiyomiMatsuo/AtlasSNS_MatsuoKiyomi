<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::get();
        return view('posts.index',['posts'=>$posts]);
    }

    //投稿の処理
    public function postCreate(Request $request){
        $post = $request->post;

        Post::create([               //新しい投稿に必要なカラムを入れる
            'post' => $post,         //postの中に変数$post
            'user_id' => Auth::id()  //user_idの中に現在認証しているユーザーのIDを取得
        ]);
        return back();
    }
}
