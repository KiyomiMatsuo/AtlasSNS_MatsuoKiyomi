<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\Post;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    //他のユーザーのプロフィールページを表示
    public function OtherProfile($id){
        //ユーザーの情報を取得する
        $users = User::where('id',$id)->first();
        //投稿を取得する
        $posts = Post::with('user')->where('user_id', $id)->get();
        return view('users.OtherProfile',compact('users','posts'));
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

    // //プロフィール編集のバリデーション
    // public function profileValidates(Request $request){
    //     $request->validate([
    //         'username' => ['required', 'string', 'min:2' , 'max:12'],
    //         'mail' => ['required', 'string', 'email', 'min:5' , 'max:40', 'unique:users'],
    //         'password' => ['required', 'string', 'alpha_num' , 'min:8', 'max:20'],
    //         'password_confirmation' => ['required', 'string', 'alpha_num' , 'min:8', 'max:20' , 'confirmed'],
    //         'bio' => ['max:150'],
    //         'icon_image' => ['file', 'image' , 'mimes:jpg,png,bmp,gif,svg' ]
    //     ],
    //     [
    //         'username.required' => '名前を入力してください',

    //     ]);
    //     return view()
    // }




}
