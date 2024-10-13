<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\User;
use App\Follow;
use App\Post;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    //プロフィール編集について
    public function update(Request $request){
        //プロフィール編集のバリデーション

        $request->validate([
            'username' => ['required', 'string', 'between:2,12'],
            'mail' => ['required', 'string', Rule::unique('users')->ignore( Auth::user()->id), 'email', 'between:5,40'],
            'password' => ['required', 'string', 'alpha_num' , 'between:8,20', 'confirmed'],
            'bio' => ['max:150'],
            'icon_image' => ['file', 'image' , 'mimes:jpg,png,bmp,gif,svg' ],
        ],
        [
            'username.required' => 'ユーザー名は必須です',
            'username.between' => 'ユーザー名は2文字以上,12文字以内で入力してください',
            'mail.required' => 'メールアドレスは必須です',
            'mail.between' => 'メールアドレスは5文字以上,40文字以内で入力してください',
            'mail.unique' => 'このメールアドレスは既に使用されています',
            'password.required' => 'パスワードは必須です',
            'password.alpha_num' => '英数字で入力してください',
            'password.between' => 'パスワードは8文字以上,20文字以内で入力してください',
            'password_confirmation.required' => 'パスワード確認は必須です',
            'password_confirmation.alpha_num' => '英数字で入力してください',
            'password_confirmation.between' => 'パスワード確認は8文字以上,20文字以内で入力してください',
            'password_confirmation.confirmed' => 'パスワードと一致していません',
            'bio.max' => '150文字以内で入力してください',
            'icon_image.mimes' => '指定したファイルは使用できません',
        ]);

        $id = $request->input('id');
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        $images = $request->file('icon_image');

        //もし、新しい画像を設定するならば
        if($request->hasFile('icon_image')){
            //（$filename getClientOriginalName でオリジナルネームをつけて）
            $filename = $request->icon_image->getClientOriginalName();
            //（$filePath storeAs に新しいプロフィール画像を入れて）
            $filePath = $request->icon_image->storeAs('images', $filename, 'public');
            //（$image には storageにある $filePath のものを入れる）
            $image = '/storage/' . $filePath;
            }else{
                //新しく画像を登録しないなら、ログインユーザーの画像を表示する
                $filename = Auth::user()->images;
        }

        User::where('id',$id)->update([
            'username' => $username,
            'mail' => $mail,
            'password' => bcrypt($password),
            'bio' => $bio,
            'images' => $filename,
        ]);
        return redirect('/top');
    }

    //他のユーザーのプロフィールページを表示
    public function OtherProfile($id){
        //ユーザーの情報を取得する
        $users = User::where('id',$id)->first();
        //投稿を取得する
        $posts = Post::with('user')->where('user_id', $id)->latest()->get();
        return view('users.OtherProfile',compact('users','posts'));
    }

    //検索する
    public function search(Request $request){
        // 1つ目の処理
        $keyword = $request->input('keyword');
        // 2つ目の処理
        if(!empty($keyword)){
            $user = User::where('username','!=', Auth::user()->username)->
                        where('username','like', '%'.$keyword.'%')->get();
            //dd($user);
            }else{
            $user = User::where('username','!=', Auth::user()->username)->get();
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
