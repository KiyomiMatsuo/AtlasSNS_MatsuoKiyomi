<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //「１対多」の「多」側 → メソッド名は複数形でhasManyを使う
    public function posts(){
        return $this->hasMany('App\Post');
    }

    // フォローする
    public function follow(Int $user_id){
        return $this->following()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id){
        return $this->following()->detach($user_id);
    }

    //多対多のリレーション定義(フォローしている側)
    //belongsToMany( 相手のモデル名 , 中間テーブルのテーブル名 , 自分のidが入るカラム名 , 相手のidが入るカラム名)
    public function following(){
        return $this->belongsToMany('App\User','follows','following_id','followed_id');
    }

    //多対多のリレーション定義(フォローされている側)
    public function followed(){
        return $this->belongsToMany('App\User','follows','followed_id','following_id');
    }

    // フォローしているか
    public function isFollowing(Int $user_id){
        return (boolean) $this->following()->where('followed_id', $user_id)->first(['follows.id']);
        //first([テーブル名.カラム名])
    }

    // フォローされているか
    public function isFollowed(Int $user_id){
        return (boolean) $this->followed()->where('following_id', $user_id)->first(['id']);
    }


}
