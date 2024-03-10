<?php

namespace App\Http\Middleware;

use Closure;

class LoginUserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //ログインユーザーIDを取得($loginIDという変数にuserのIDが入る)
        $loginId = Auth::id();
        //カート情報のユーザーIDを取得
        $requestId = $request->user_id;

        //ログイン者とカート情報作成者が一致しなければ別のページにリダイレクト
        if ($loginId != $requestId) {
            return redirect(route('/login'));
        }

        //チェックに合格し次の処理に進むことができる
        return $next($request);
    }
}
