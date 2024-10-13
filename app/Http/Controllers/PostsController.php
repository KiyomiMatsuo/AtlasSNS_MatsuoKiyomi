<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();
        $user = Auth::user();
        return view('posts.index',['posts'=>$posts,'user'=>$user]);
    }

    //投稿の処理
    public function postCreate(Request $request){
        $request->validate([
            'post'=>['required', 'between:1,150'],
        ],[
            'post.required' => '投稿は必須です',
            'post.between' => '投稿は1文字以上,150文字以内で入力してください',
        ]);

        $post = $request->input('post');

        Post::create([               //新しい投稿に必要なカラムを入れる
            'post' => $post,         //postの中に変数$post
            'user_id' => Auth::id()  //user_idの中に現在認証しているユーザーのIDを取得
        ]);
        return back();
    }

    //投稿の編集
    public function edit($id){
        $post = Post::where('id',$id)->first();
        return view('posts.edit',['post'=>$post]);
    }

    //更新処理をするための実装
    public function update(Request $request)
    {
        $request->validate([
            'upPost'=>['required', 'between:1,150'],
        ],[
            'upPost.required' => '投稿は必須です',
            'upPost.between' => '投稿は1文字以上,150文字以内で入力してください',
        ]);

        // 1つ目の処理
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        // 2つ目の処理
        Post::where('id', $id)->update([
            'post' => $up_post,
        ]);
        // 3つ目の処理
        return redirect('/top');
    }

    //投稿の削除処理をするための実装
    public function delete($post)
    {
        Post::where('post', $post)->delete();
        return redirect('/top');
    }

}
