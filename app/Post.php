<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'post',
    ];

    //「１対多」の「1」側 → メソッド名は単数形でbelongsToを使う
    public function user(){
        return $this->belongsTo('App\User');
    }
}
